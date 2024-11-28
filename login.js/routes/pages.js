const express = require('express');
const app = express();

const router = express.Router();

router.get("/", (req,res)=>{
    // res.send("<h1>Helloo</h1>");
    res.render('inex');
});
router.get("/dashboard", (req,res)=>{
    // res.send("<h1>Helloo</h1>");
    res.render('dashboard');
});
module.exports = router;
