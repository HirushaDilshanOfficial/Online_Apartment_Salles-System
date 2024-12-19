<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="css/faq.css">
    <link rel="stylesheet" href="css/footer.css">
    <title>FAQ</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <?php include 'header.php'?>
    <!---header-->
    <div class="header">
        <h1 class="header-title">FAQ</h1>
        <p class="header-desc">Frequently Ask Questions</p>
    </div>

    <div class="faq">
        <div class="faq-name">
            <h1 class="faq-header">HAVE<br>ANY QUESTIONS?</h1>
            <img class="faq-img" src="images/question.jpg" alt="FAQ Image">
        </div>

        <div class="faq-box">
            <div class="faq-wrapper">
                <input type="checkbox" class="faq-trigger" id="faq-trigger-1">
                <label class="faq-title" for="faq-trigger-1">How do I search for apartments on the platform?</label>
                <div class="faq-detail">
                    <p>You can search for apartments by using the search bar and filters such as location, price range,<br> apartment type, number of bedrooms, and more. Simply enter your preferences and view the available listings.</p>
                </div>
            </div>

            <div class="faq-wrapper">
                <input type="checkbox" class="faq-trigger" id="faq-trigger-2">
                <label class="faq-title" for="faq-trigger-2">Is there a fee to use this platform?</label>
                <div class="faq-detail">
                    <p>The platform is free to browse for potential renters or buyers. <br>However, property owners may need to pay a listing fee or commission depending on the platform’s terms.</p>
                </div>
            </div>

            <div class="faq-wrapper">
                <input type="checkbox" class="faq-trigger" id="faq-trigger-3">
                <label class="faq-title" for="faq-trigger-3">How accurate is the availability of apartments listed?</label>
                <div class="faq-detail">
                    <p>We strive to keep our listings as up-to-date as possible. Availability is regularly updated,<br> but it’s recommended to contact the property owner or manager to confirm.</p>
                </div>
            </div>

            <div class="faq-wrapper">
                <input type="checkbox" class="faq-trigger" id="faq-trigger-4">
                <label class="faq-title" for="faq-trigger-4">How do I book a viewing for an apartment?</label>
                <div class="faq-detail">
                    <p>Once you find an apartment you like, you can schedule a viewing directly through <br>the platform by contacting the owner or using the scheduling tool provided in the listing.</p>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php'?>
</body>
</html>
