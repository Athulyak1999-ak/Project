<?php
session_start();
if (!isset($_SESSION['role'])) {
    header("location: ./login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <title>Dairy managenent system</title>

    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .bdimage {
            background-image: url("assets/images/verterinary_doctors.png");
            background-color: #cccccc;
            height: 300px;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            position: relative;
        }

        .hero-text {
            text-align: center;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
        }

        #customers {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }



        #leftbox {
            float: left;
            background: white;
            width: 75%;
            height: auto;
        }


        #rightbox {
            float: right;
            background: lavender;
            width: 25%;
            height: auto;

        }

        h1 {
            color: green;
            text-align: center;
        }

        .scroller {
            width: 25%;

            overflow-y: scroll;
            scrollbar-color: rebeccapurple green;
            scrollbar-width: thin;
            float: right;
            background: lavender;
            height: 550px;
        }
    </style>


</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="js-preloader" class="js-preloader">
        <div class="preloader-inner">
            <span class="dot"></span>
            <div class="dots">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">Dairy<em> System</em></a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="seller_home.php">Home</a></li>

                            <li><a href="Milkrate_seller.php">Milk Rate</a></li>

                            <li><a href="#" class="active">Doctors Details</a></li>
                            <li><a><?php echo $_SESSION['username']; ?></a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Main Banner Area Start ***** -->
    <div class="bdimage">
        <div class="hero-text">
            <h4> Keep Calm and Love Cows</h4>

        </div>
    </div>
    <!-- ***** Main Banner Area End ***** -->



    <div id="boxes">

        <div id="leftbox">
            <h1>Doctors Details</h1>

            <table id="customers">
                <tr>
                    <th>NAME </th>
                    <th>CONTACTS</th>
                    <th>ADDRESS</th>
                </tr>
                <tr>
                    <td>Dr. Varun</td>
                    <td>9856749517</td>
                    <td>Pala,Kottayam,Kerala </td>
                </tr>
                <tr>
                    <td>Dr.Priya</td>
                    <td>6789457890</td>
                    <td>Bathery,Wayanad,Kerala</td>
                </tr>
                <tr>
                    <td>Dr.Siya Raje</td>
                    <td>9856743209</td>
                    <td>Kanjirappaly,Kottayam,Kerala</td>
                </tr>
                <tr>
                    <td>Dr.Anu Krishna</td>
                    <td>9856657893</td>
                    <td>Pakkam,Wayanad,Kerala</td>
                </tr>
                <tr>
                    <td>Dr. Shan</td>
                    <td>7904576789</td>
                    <td>Pala,Kottayam,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. Krishna</td>
                    <td>7890675467</td>
                    <td>Balusheriy,Kozhikode,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. Varsha</td>
                    <td>8976560823</td>
                    <td>Bathery,Wayanad,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. Nandtha</td>
                    <td>6798404748</td>
                    <td>3Th Maile,Kozhikode,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. syama</td>
                    <td>7906789645</td>
                    <td>Balusheriy,Kozhikode,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. Vikase</td>
                    <td>7865789054</td>
                    <td>Bathery,Wayanad,Kerala </td>
                </tr>
                <tr>
                    <td>Dr. Stebin</td>
                    <td>5689046789</td>
                    <td>5Th Maile,Kozhikode,Kerala </td>
                </tr>

            </table>
        </div>

        <div class="scroller">
            <h4>Frequantly Asked Questions</h4>
            <p>1) What is the importance of Artificial Insemination (AI)?
                കൃത്രിമ ബീജസങ്കലനത്തിന്റെ (AI) പ്രാധാന്യം എന്താണ്?
            </p>
            <p> Answer: AI is the technique in which semen is collected from the superior bulls
                and introduced into female reproductive tract at proper time with the help of instruments.
                The major advantage of AI over natural mating is that it permits the dairy farmer to use top proven
                sires for genetic improvement of his herd and control of venereal diseases. AI is also of tremendous
                value in making optimal use of different sires and enables dairy farmer
                to breed individual cows to selected sires according to their breeding goal.
                (ഉയർന്ന കാളകളിൽ നിന്ന് ബീജം ശേഖരിക്കുകയും
                ഉപകരണങ്ങളുടെ സഹായത്തോടെ ശരിയായ സമയത്ത് സ്ത്രീകളുടെ പ്രത്യുത്പാദന അവയവത്തിലേക്ക് കൊണ്ടുവരികയും
                ചെയ്യുന്ന സാങ്കേതികതയാണ് AI. പ്രകൃതിദത്ത ഇണചേരലിനേക്കാൾ AI യുടെ പ്രധാന നേട്ടം, ക്ഷീരകർഷകനെ
                തന്റെ കൂട്ടത്തിന്റെ ജനിതക മെച്ചപ്പെടുത്തലിനും ലൈംഗിക രോഗങ്ങളുടെ നിയന്ത്രണത്തിനും മികച്ച തെളിയിക്കപ്പെട്ട
                സൈറുകളെ ഉപയോഗിക്കാൻ ഇത് അനുവദിക്കുന്നു എന്നതാണ്. വ്യത്യസ്‌തമായ സൈറുകളെ ഒപ്റ്റിമൽ
                ഉപയോഗപ്പെടുത്തുന്നതിലും AI-യ്‌ക്ക് വളരെയധികം മൂല്യമുണ്ട്, കൂടാതെ ക്ഷീരകർഷകനെ
                അവരുടെ ബ്രീഡിംഗ് ലക്ഷ്യത്തിനനുസരിച്ച് തിരഞ്ഞെടുത്ത പശുക്കളെ വളർത്താൻ പ്രാപ്‌തമാക്കുന്നു.)</p>
            <p>2) What should be the weight and age of cows and buffalo heifers at the time of AI?
                AI-യുടെ സമയത്ത് പശുക്കളുടെയും എരുമകളുടെയും ഭാരവും പ്രായവും എത്രയായിരിക്കണം?
            </p>
            <p> Answer: The weight and age of cow heifer should be 15-18 months and 275-300 Kg and that of buffalo heifers
                should be 26-30 months, 300-325 Kg at the time of first AI.
                പശുക്കിടാവിന്റെ തൂക്കവും പ്രായവും 15-18 മാസവും 275-300 കിലോയും എരുമ പശുക്കിടാങ്ങളുടേതും ആയിരിക്കണം.
                26-30 മാസം ആയിരിക്കണം, ആദ്യ AI-യുടെ സമയത്ത് 300-325 കിലോ.
            </p>
            <p>3) How the animals can be detected in heat?
                ചൂടിൽ മൃഗങ്ങളെ എങ്ങനെ കണ്ടെത്താം?
            </p>
            <p>Answer: The animals should be watched carefully for heat symptoms for half an hour atleast in
                the morning (5-7 AM) and evening (between 8-10 PM). The common heat symptoms in dairy animals are
                mounting behavior, mucus discharge from genitalia, restlessness,
                swelling of vulva, loss of appetite, bellowing, frequent urination and fall in milk yield.
                കുറഞ്ഞത് അരമണിക്കൂറെങ്കിലും ചൂടിന്റെ ലക്ഷണങ്ങൾക്കായി മൃഗങ്ങളെ ശ്രദ്ധാപൂർവ്വം നിരീക്ഷിക്കണം
                രാവിലെയും (5-7 AM) വൈകുന്നേരവും (രാത്രി 8-10 നും ഇടയിൽ). ക്ഷീര മൃഗങ്ങളിൽ സാധാരണ ചൂട് ലക്ഷണങ്ങൾ
                വർദ്ധിച്ചുവരുന്ന പെരുമാറ്റം, ജനനേന്ദ്രിയത്തിൽ നിന്നുള്ള കഫം ഡിസ്ചാർജ്, അസ്വസ്ഥത,
                യോനിയിലെ വീക്കം, വിശപ്പില്ലായ്മ, ബെല്ലിംഗ്, ഇടയ്ക്കിടെ മൂത്രമൊഴിക്കൽ, പാലുൽപാദനം കുറയൽ</p>
            <p>4) What is the ideal time for animal to get pregnant after calving?
                പ്രസവശേഷം മൃഗത്തിന് ഗർഭം ധരിക്കാൻ അനുയോജ്യമായ സമയം ഏതാണ്?
            </p>
            <p>Answer: Following parturition the cow or buffalo should conceive between 80-100 days to maintain the
                calving interval of nearly one year
                പ്രസവശേഷം പശുവും എരുമയും 80-100 ദിവസങ്ങൾക്കിടയിൽ ഗർഭം ധരിക്കണം
                ഏകദേശം ഒരു വർഷത്തെ പ്രസവ ഇടവേള
            </p>
            <p>5) What is the ideal time for pregnancy diagnosis after insemination?
                ബീജസങ്കലനത്തിനു ശേഷം ഗർഭധാരണത്തിന് അനുയോജ്യമായ സമയം ഏതാണ്?
            </p>
            <p>Answer: The inseminated cow or buffalo not showing heat symptoms should be examined for
                pregnancy diagnosis two months after the AI.
                ബീജസങ്കലനം നടത്തിയ പശുവിനെയോ എരുമയെയോ ഉഷ്ണ ലക്ഷണങ്ങൾ കാണിക്കാത്തതാണോ എന്ന് പരിശോധിക്കണം
                AI കഴിഞ്ഞ് രണ്ട് മാസത്തിന് ശേഷം ഗർഭം രോഗനിർണയം
            </p>
        </div>
    </div>







    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/mixitup.js"></script>
    <script src="assets/js/accordions.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>

</body>

</html>