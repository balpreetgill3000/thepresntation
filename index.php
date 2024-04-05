<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article Page</title>
    <style>
        /* Resetting default margin and padding */
        body, h1, h2, p, ul, li {
            margin: 0;
            padding: 0;
        }

        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 960px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            margin-top: 20px;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        /* Navigation styles */
        nav {
            background-color: #333;
            color: #fff;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        nav ul {
            list-style-type: none;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }

        /* Article styles */
        .article {
            margin-bottom: 40px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 20px;
        }

        .article h2 {
            font-size: 24px;
            margin-bottom: 10px;
            color: #333;
        }

        .article img {
            display: block;
            margin-bottom: 15px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            max-width: 100%;
            height: auto;
        }

        .article p {
            font-size: 16px;
            line-height: 1.8;
            color: #555;
        }

        /* Responsive styles */
        @media screen and (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .article h2 {
                font-size: 20px;
            }

            .article img {
                max-width: 100%;
            }

            .article p {
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
    </nav>
    <div class="container">
        <h1>Articles</h1>
        <div class="articles-container">
            <?php
                // Database credentials
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "sample";

                // Create connection
                $conn = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch articles from the database
                $sql = "SELECT * FROM articles";
                $result = $conn->query($sql);

                // Display articles
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="article">';
                        echo '<h2>' . $row['title'] . '</h2>';
                        echo '<img src="' . $row['image_url'] . '" alt="' . $row['title'] . '">';
                        echo '<p>' . $row['description'] . '</p>';
                        echo '</div>';
                    }
                } else {
                    echo "No articles found.";
                }

                // Close connection
                $conn->close();
            ?>
        </div>
    </div>
    <section id="home">
        <h2>Home Section</h2>
        <p>Go to home section to explore other options.</p>
    </section>
    <section id="contact">
        <h2>Contact Section</h2>
        <p>contact us on the company email 'bal3000@gmail.ca' for further inquiries.</p>
    </section>
</body>
</html>