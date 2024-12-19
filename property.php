<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Urban Heaven - Property Page</title>
    <link rel="stylesheet" href="css/property.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/footer.css">
    <script defer src="js/property.js"></script>

    

</head>

<body>   
<?php include 'admin_header.php'; ?> 


    <main>
        <div class="search-bar">
        <form id="search-form" action="property.php" method="GET">
                <select name="district" id="district">
                    <option value="" disabled selected>Select District</option>
                    <option value="Colombo">Colombo</option>
                    <option value="Gampaha">Gampaha</option>
                    <option value="Kaluthara">Kaluthara</option>
                    <option value="Galle">Galle</option>
                    <option value="Matara">Matara</option>
                    <option value="Hambanthota">Hambanthota</option>
                    <option value="Kurunagala">Kurunagala</option>
                    <option value="Badulla">Badulla</option>
                    <option value="Anuradhapura">Anuradhapura</option>
                    <option value="Polonnaruwa">Polonnaruwa</option>
                    <option value="Monaragala">Monaragala</option>
                    <option value="Muwara Eliya">Kandy</option>
                    <option value="Monaragala">Nuwara Eliya</option>
                </select>
                <button type="button" class="search-btn" id="search-btn" onclick="filterProperties()">Search</button>

            </form>
        </div>

        <div class="property-grid">
            <?php include 'collect_properties.php'; ?>
        </div>
    </main>

    <?php include 'admin_footer.php'; ?> 
</body>
</html>