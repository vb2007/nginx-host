const express = require("express");
const sqlite3 = require("sqlite3").verbose();

const app = express();
const port = 5500;

app.use(express.static("public"));
app.use(express.urlencoded({ extended: true }));

// Connect to the database
const db = new sqlite3.Database("./test.db", sqlite3.OPEN_READWRITE, (err) => {
    if (err) return console.error(err.message);
});

// Serve the HTML form
app.get("/insert", (req, res) => {
    res.sendFile(__dirname + "/index.html");
});

// Handle form submission
app.post("/insert", (req, res) => {
    console.log("Received form data:", req.body);

    const { first_name, last_name, username, password, email } = req.body;
    const sql = `INSERT INTO users(first_name, last_name, username, password, email) VALUES (?, ?, ?, ?, ?)`;

    db.run(sql, [first_name, last_name, username, password, email], (err) => {
        if (err) {
            return console.error(err.message);
        }
        console.log("Data inserted successfully");
        res.redirect("/");
    });
});


app.listen(port, () => {
    console.log(`Server is running on port ${port}`);
});