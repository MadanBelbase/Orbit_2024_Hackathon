const mysql = require('mysql');
const express = require('express');
const bodyParser = require('body-parser');

const app = express();

// Middleware to parse JSON and URL-encoded data
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Create MySQL connection
const db = mysql.createConnection({
    host: process.env.DATABASE_HOST,
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD || "", // Ensure the correct password
    database: process.env.DATABASE_NAME // Ensure this matches the database name
});

// Connect to the database
db.connect((err) => {
    if (err) {
        console.error("Database Connection Failed:", err.message);
    } else {
        console.log("Connected to MySQL database.");
    }
});

// Register function
exports.register = (req, res) => {
    console.log("Received Request Body:", req.body);

    const { citizenNo, phone, pan, orgPhone } = req.body;


    // User registration
    if (citizenNo && phone) {
        // db.query('SELECT * FROM users WHERE citizenNo = ?', [citizenNo], (err, results) => {
        //     if (err) {
        //         console.error("Database Error (User Check):", err);
        //         return res.status(500).send("Internal Server Error");
        //     }
        //     if (results.length > 0) {
        //         return res.render('dashboard', { message: "User already registered" });
        //     }
            db.query('INSERT INTO users SET ?', { citizenNo, phone }, (err, results) => {
                if (err) {
                    console.error("Database Error (User Insert):", err);
                    return res.status(500).send("Error inserting user data");
                }
                console.log("User successfully registered:", results);
                return res.redirect('/dashboard');
            });
       ;
    }

    // Organization registration
    else if (pan && orgPhone) {
        db.query('SELECT * FROM organizations WHERE pan = ?', [pan], (err, results) => {
            if (err) {
                console.error("Database Error (Org Check):", err);
                return res.status(500).send("Internal Server Error");
            }
            if (results.length > 0) {
                return res.render('dashboard', { message: "Organization already registered" });
            }
            db.query('INSERT INTO organizations SET ?', { pan, orgPhone }, (err, results) => {
                if (err) {
                    console.error("Database Error (Org Insert):", err);
                    return res.status(500).send("Error inserting organization data");
                }
                console.log("Organization successfully registered:", results);
                return res.redirect('/dashboard');
            });
        });
    } else {
        // Invalid request
        console.error("Invalid Registration Details:", req.body);
        return res.status(400).send("Invalid registration details");
    }
};

// Add test route for the register function
app.post('/register', (req, res) => {
    exports.register(req, res);
});

// Start the server
const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
