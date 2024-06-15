from flask import Flask, request, render_template, redirect, url_for, flash
from flask_cors import CORS
from passlib.hash import pbkdf2_sha256
import mysql.connector
from mysql.connector import Error

app = Flask(__name__)
CORS(app)


db_config = {
    'host': 'localhost',
    'database': 'quiz',
    'user': 'root',
    'password': ''
}

@app.route('/')
def index():
    return render_template('login.html')

@app.route('/sign-in', methods=['POST'])
def sign_in():
    username = request.form['username']
    password = request.form['password']

    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor(dictionary=True)
        cursor.execute('SELECT * FROM users WHERE username = %s', (username,))
        user = cursor.fetchone()
        cursor.close()
        conn.close()

        if user and pbkdf2_sha256.verify(password, user['password']):
            flash('Login successful!', 'success')
            return redirect(url_for('index'))
        else:
            flash('Login failed. Check your username and/or password.', 'danger')
            return redirect(url_for('index'))

    except Error as e:
        print(f"Error connecting to MySQL: {e}")
        flash('An error occurred. Please try again.', 'danger')
        return redirect(url_for('index'))

if __name__ == '__main__':
    app.run(debug=True)
