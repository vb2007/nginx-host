import sqlite3
from flask import Flask, renderer_template, request, g

Database = "user_data.db"

def open_connection():
    db = getattr(g, "_database", None)
    if db is None:
        db = g._database = sqlite3.connect(Database)
    return db

@app.teardown_appcontext
def close_connection():
    db = getattr(g, "_database", None)
    if db is not None:
        db.close()

def index():
    if request.method == "post":
        username = request.form["username"]
        password = request.form["password"]

        db = open_connection()
        cursor = db.cursor()
        cursor.execute("INSERT INTO users (username, password) VALUES (?, ?)', (username, password)")
        db.commit()
    return renderer_template("index.html")