const express = require('express');
const mysql = require('mysql');
const dotenv = require('dotenv').config({ path: './.env' });
const path = require('path');

const app = express();

// MySQL Database Connection
const db = mysql.createConnection({
    host: process.env.DATABASE_HOST, // Fixed environment variable casing
    user: process.env.DATABASE_USER,
    password: process.env.DATABASE_PASSWORD,
    database: process.env.DATABASE
});

// Static Files
const publicDirectory = path.join(__dirname, './public');
app.use(express.static(publicDirectory));

// View Engine
app.set('view engine', 'hbs');

// Middleware
app.use(express.urlencoded({ extended: true })); // Handle form data
app.use(express.json()); // Handle JSON data

// Database Connection
db.connect((error) => {
    if (error) {
        console.log(`Database connection error: ${error.message}`);
    } else {
        console.log('MySQL connected');
    }
});

// Routes
app.use('/', require('./routes/pages'));
app.use('/auth', require('./routes/auth'));

// Global Error Handler
app.use((err, req, res, next) => {
    console.error(err.stack);
    res.status(500).send('Something went wrong!');
});

// Start Server
const PORT = process.env.PORT || 3003;
app.listen(PORT, () => {
    console.log(`Server is running on port ${PORT}`);
});
