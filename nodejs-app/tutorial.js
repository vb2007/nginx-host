let sql;
const sqlite3 = require("sqlite3").verbose();

//connect to database
const db = new sqlite3.Database("./test.db", sqlite3.OPEN_READWRITE,(err)=> {
    if (err) return console.error(err.message);
});

//create table
sql = `CREATE TABLE users(id INTEGER PRIMARY KEY,first_name,last_name,username,password,email)`;
db.run(sql);

//drop table
db.run("DROP TABLE users");

//insert data
sql = `INSERT INTO users(first_name,last_name,username,password,email) VALUES (?,?,?,?,?)`;
db.run(
    sql,
    // ["mike","nig","mikenig","test","test@gmail.com"],
    ["fred","gin","fredgin","nottest","nottesttest@gmail.com"],
    (err)=> {
    if (err) return console.error(err.message);
});

//query database
sql = `SELECT * FROM users`;
db.all(sql, [], (err, rows) => {
    if (err) return console.error(err.message);
    rows.forEach((row) => {
        console.log(row);
    });
});