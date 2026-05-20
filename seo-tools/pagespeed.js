require("dotenv").config();
const axios = require("axios");
const fs = require("fs");

const API_KEY = process.env.PAGESPEED_API_KEY;
const URL = process.env.SITE_URL;

async function runPageSpeed(strategy) {
    const endpoint = `https://pagespeedonline.googleapis.com/pagespeedonline/v5/runPagespeed?url=${URL}&strategy=${strategy}&key=${API_KEY}`;

    try {
        const res = await axios.get(endpoint);

        const fileName = `psi-${strategy}.json`;

        fs.writeFileSync(fileName, JSON.stringify(res.data, null, 2));

        console.log(`Informe guardado: ${fileName}`);
    } catch (error) {
        console.error("Error:", error.message);
    }
}

(async () => {
    await runPageSpeed("mobile");
    await runPageSpeed("desktop");
})();