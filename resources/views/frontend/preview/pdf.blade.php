< !DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <style>
            h1 {
                font - family: 'Julius Sans One', sans-serif;
            }

            h2 {
                font - family: 'Archivo Narrow', sans-serif;
            }

            h3 {
                /* Accountant */
                font - family: 'Open Sans', sans-serif;
            }


            .smallText,
            .smallText span,
            .smallText p,
            .smallText a {
                font - family: 'Source Sans Pro', sans-serif;
                text-align: justify;
            }

            /* End Family */

            /* Colors */
            h1 {
                color: #111;
            }

            .leftPanel,
            .leftPanel a {
                color: #bebebe;
                text-decoration: none;
            }

            .leftPanel h2 {
                color: white;
            }

            /* End Colors */

            /* Sizes */
            h1 {
                font - weight: 300;
                font-size: 1.2cm;
                transform: scale(1, 1.15);
                margin-bottom: 0.2cm;
                margin-top: 0.2cm;
                text-transform: uppercase;
            }

            h2 {
                margin - top: 0.1cm;
                margin-bottom: 0.1cm;
            }

            .leftPanel,
            .leftPanel a {
                font - size: 0.38cm;
            }


            .smallText,
            .smallText span,
            .smallText p,
            .smallText a {
                font - size: 0.35cm;
            }

            .leftPanel .smallText,
            .leftPanel .smallText,
            .leftPanel .smallText span,
            .leftPanel .smallText p,
            .smallText a {
                font - size: 0.45cm;
            }

            p {
                margin - top: 0.05cm;
                margin-bottom: 0.05cm;
            }


            @page {
                size: 21cm 29.7cm;
                padding: 0;
                margin: 0mm;
                border: none;
                border-collapse: collapse;
            }

            /* End Printing */

            .container {
                display: flex;
                flex-direction: row;
                width: 100%;
                height: 100%;
            }

            .leftPanel {
                width: 17%;
                background-color: #484444;
                padding: 0.7cm;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .rightPanel {
                width: 73%;
                padding: 0.7cm;
            }


            .leftPanel .details {
                width: 100%;
                display: flex;
                flex-direction: column;
            }


            .bottomLineSeparator {
                border - bottom: 0.05cm solid white;
            }

            .item {
                padding - bottom: 0.7cm;
                padding-top: 0.7cm;
            }

            .item h2 {
                margin - top: 0;
            }
        </style>
    </head>

    <body>
        <div>
            <div style="width: 20%; float: left;" style="background-color: red">
                <p style="text-align: center; font-size: 2cm;">DIGITAL LIBRARY MANAGEMENT SYSTEM</p>
            </div>
            <div style="width: 80%; float: left;">
            </div>
        </div>
    </body>

    </html>
