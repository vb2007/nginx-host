const express = require('express');
const sqlite3 = require('sqlite3').verbose();

const app = express();
const port = 5500;

app.use(express.static('public'));
// Middleware to parse JSON
app.use(express.json());

// Create and connect to the SQLite database
const db = new sqlite3.Database('users.db');

// Create a 'users' table if it doesn't exist
db.run(`
  CREATE TABLE IF NOT EXISTS users (
    id INTEGER PRIMARY KEY,
    username TEXT NOT NULL,
    password TEXT NOT NULL
  )
`);

// Define a route to handle user registration
app.post('/reg', (req, res) => {
  const { username, password } = req.body;
  // Insert user data into the 'users' table
  const insertQuery = `INSERT INTO users (username, password) VALUES (?, ?)`;
  db.run(insertQuery, [username, password], (err) => {
    if (err) {
      console.error(err.message);
      res.status(500).json({ error: 'Registration failed' });
    } else {
      res.json({ message: 'Registration successful' });
    }
  });
});

app.listen(port, () => {
  console.log(`Server is running on port ${port}`);
});
