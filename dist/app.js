const express = require('express');
const path = require('path');
const { exec } = require('child_process');
const cors = require('cors');

const app = express();
const publicPath = path.join(__dirname, 'public');

app.use(express.json());
app.use(cors());
app.use(express.static(publicPath)); // Serve static files from the 'public' directory

app.get('/', (req, res) => {
    res.sendFile(path.join(publicPath, 'index.html'));
});

app.get('/getDate', (req, res) => {
    const currentDate = new Date();
    res.send(currentDate);
});

const PORT = process.env.PORT || 3000;
app.listen(PORT, () => {
    console.log(`Server is running on http://localhost:${PORT}`);
    process.title = "Lunch Express App";
});



//Run this Command if You make Changes to the Files
//pkg package.json --output "lunch" --target node14-win-x64