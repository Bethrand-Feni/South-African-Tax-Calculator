<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator</title>
    <style>
        body {
            background-image: url('Resources/Images/strokes_backg.jpg');
            background-size: cover;
            background-repeat: no-repeat; 
            background-position: center;
            display: flex;
            justify-content: center; /* Horizontal centering */
            align-items: center;     /* Vertical centering */
            height: 100vh;           /* Full viewport height */
            margin: 0;
        }
        h1 {
            top: 2px;
            text-align: center; 
            margin-top: 10px; 
            color: darkgreen;
            font-size: 2.5em;
            position: absolute;
            z-index: 7; 
        }
        #bok_up {
    width: 255px;
    height: 250px;
    position: absolute;
    bottom: 10px;
    right: 13px;
    z-index: 3;
        }
        #rec_mid{
    width: 1100px;
    height: 650px;
    position: absolute;
    justify-content: center;
    z-index: 1;
        }
        
        #grass{
            position: fixed;
            bottom: 0;
            /* left: 50%;
            translate: translateX(-50%); */
            width: 100%;
            height: auto;
            z-index: 2;
        }
        #speech_bubble{
            width: 500px;
            height: 350px;
            position: absolute;
            bottom: 140px;
            right: 170px;
            z-index: 4;
        }
        #input_form{
            position: relative;
            z-index: 5;
        }
        .form-container {
                left: 200px;
                top: 100px;
                display: flex;
                flex-direction: column;
                width: 1000px;
                z-index: 5;
                position: absolute;
            }
        /* Input and label styling */
        .form-container label {
            font-size: 14px;
            margin-top: 10px;
        }
        .form-container input[type="text"],
        .form-container input[type="submit"] {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            width: 50%;
        }
        .form-container input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
            font-weight: bold;
            margin-top: 15px;
            transition: background-color 0.3s;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
        .container {
  display: inline-block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 16px;
  width: 16px;
  background-color: #eee;
  border-radius: 50%;
  border: 2px solid black;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: white;
  border: 2px solid green;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
  top: 50%; /* Center vertically */
  left: 50%; /* Center horizontally */
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: green;
  transform: translate(-50%, -50%); /* Shift it back to center */
}
.radio-wrapper {
            display: inline-flex; /* Makes each radio wrapper align horizontally */
            align-items: center;  /* Centers items within each wrapper */
            margin-right: 200px;   /* Spacing between each radio-wrapper */
}

.spacer {
    height: 40px; /* Adjust height for desired spacing */
}

.button {
  display: inline-flex; /* Use inline-flex for a button with inline properties */
  align-items: center; /* Vertically centers the content */
  justify-content: center; 
  border-radius: 25px;
  background-color: #A98B41;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 28px;
  padding: 20px;
  width: 150px;
  height: 50px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button span {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button span:after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover span {
  padding-right: 25px;
}

.button:hover span:after {
  opacity: 1;
  right: 0;
}

.larger-text {
  font-size: 24px; 
}
#cycling_description{
    position: absolute; /* Allows you to move it freely */
    right: 400px; /* Distance from the top of the page */
    bottom: 300px;
    z-index: 8;
  }

    </style>
</head>
<body>
    <h1 style="text-align: center" >Springbok Tax Calculator</h1>
    <form action="final_page.php" method="POST" class="form-container">        <label>How old are you?</label>
        <div class="spacer"></div> 
        <div>
            <div class="radio-wrapper">
                <label class="container">Under 65
                <input type="radio" checked="checked" name="radio" value="under_65">
                <span class="checkmark"></span>
                </label>
            </div>
            <div class="radio-wrapper">
                <label class="container">Between 65 and 75
                <input type="radio" name="radio" value="65_to_75">
                <span class="checkmark"></span>
                </label>
            </div>
            <div class="radio-wrapper">
                <label class="container">Over 75
                <input type="radio" name="radio" value="over_75">
                <span class="checkmark"></span>
                </label>
            </div>
        </div>
        <div class="spacer"></div>
        <div class="spacer"></div>

   
        <label style="font-size: 15px;" for="income">How much do you earn <strong>monthly</strong>?</label>
        <input type="text" id="income" name="income" required>

        <div class="spacer"></div>
        <div class="spacer"></div>
        <div class="spacer"></div>

        <button type="submit"class="button" style="vertical-align:middle"><span style="font-size: 18px;">Calculate </span></button>
    </form>
    </div>
    <img id="bok_up" class="custom-image" src="Resources/Images/bok_up.png">
    <img id="rec_mid" class="custom-image" src="Resources/Images/rec_mid.png">
    <img id="grass" class="custom-image" src="Resources/Images/grass.png">
    <img id="speech_bubble" class="custom-image" src="Resources/Images/speech_bubble.png">
    <div id="cycling_description" style="color:#FFFFFF;font-size:18px">
        Random description 
    </div>

</body>
</html>
