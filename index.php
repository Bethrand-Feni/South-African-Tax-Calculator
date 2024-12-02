

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
            justify-content: center; 
            align-items: center;     
            height: 100vh;   
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
          width: 23vw;
    height: 38vh;
    position: absolute;
    bottom: 1%;
    right: 0.1%;
    z-index: 1;
        }
        #grass{
            position: fixed;
            bottom: 0;
            width: 100%;
            height: auto;
            z-index: 2;
        }
        #speech_bubble{
            width: 36.6vw;
            height: 45.7vh;
            position: absolute;
            bottom: 140px;
            right: 170px;
            z-index: 4;
        }
        #input_form{
            position: relative;
            z-index: 5;
            height: 30px;
            width: 450px;
            border-radius: 7px;
            border: 2px solid #D3D3D3;

        }
        #income{
          font-size: 16px;
        }
        .speech-bubble{
          width: 36.6vw;
          height: 45.7vh;
          position: absolute;
          bottom: 140px;
          right: 170px;
        }
        .form-container {
                left: 50px;
                top: 50px;
                display: flex;
                flex-direction: column;
                width: 1000px;
                z-index: 5;
                position: absolute;
            }
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
.white-box{
          width: 75vw;
          height: 80vh;
          background-color: white;
          border-radius: 35px;
          box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.3);
          margin: 20px auto; 
          position: relative;
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

.container .checkmark:after {
  top: 50%;
  left: 50%;
  width: 10px;
  height: 10px;
  border-radius: 50%;
  background: green;
  transform: translate(-50%, -50%);
}
.radio-group {
  display: flex;
  gap: 10px; /* Spacing between the items */
  flex-wrap: wrap; /* Allows items to wrap onto a new line */
}


.radio-wrapper {
  flex: 1; /* Takes up equal space for each button */
  min-width: 150px;   
}

@media (max-width: 1100px) {
  .radio-group {
    flex-direction: column; /* Stack vertically on smaller screens */
  }
}

.spacer {
    height: 40px; 
}

.spacer-half {
    height: 20px; 
}


.button {
  display: inline-flex; 
  align-items: center; 
  justify-content: center; 
  border-radius: 22px;
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
    right: 365px; /* Distance from the top of the page */
    bottom: 300px;
    z-index: 8;
    color:#FFFFFF;
    font-size: min(3vw, 16px); /* Text will adjust up to 18px */
    width: fit-content; /* Allows width to adjust to fit text */
    /* font-size:16px; */
    width: 200px; /* Define the width of the container */
    max-width: 100%; /* Responsive width limit */
    text-align: center; /* Center-align the text */
    overflow-wrap: break-word; /* Break long words to prevent overflow */
    line-height: 1.2; /* Adjust line height for readability */
    white-space: normal;
  }
  @media (max-width: 1200px) {
    #cycling_description,
    #speech_bubble{
      display: none;
    }
    
  }
  @media (max-width: 700px) {
  #input_form{
    width: 300px;
  }
}
@media (max-width: 600px) {
  #bok_up{
    display: none;
  }
  .button{
    right: 50%;
    transform: translateX(40%);
  }
}
@media (max-width: 470px) {
  h1{
    font-size: 1.5em;
  }
  .button{
    right: 50%;
    transform: translateX(25%);
  }
  #income{
    font-size: 12px;
  }
  #input_form{
    width: 240px;
  }
  .form-container{
    left: 10px;
  }

}

    </style>
</head>
<body>
    <h1 style="text-align: center" >Springbok Tax Calculator</h1>
    <div class="white-box">
      <form action="final_page.php" method="POST" class="form-container">        
        <label style="font-size: 16px;">How <strong>old</strong>  are you?</label>
          <div class="spacer"></div> 
          <div class="radio-group">
            <div class="radio-wrapper">
                  <label class="container">Under 65
                  <input type="radio" checked="checked" name="age" value="1">
                  <span class="checkmark"></span>
                  </label>
              </div>
              <div class="radio-wrapper">
                  <label class="container">Between 65 and 75
                  <input type="radio" name="age" value="2">
                  <span class="checkmark"></span>
                  </label>
              </div>
              <div class="radio-wrapper">
                  <label class="container">Over 75
                  <input type="radio" name="age" value="3">
                  <span class="checkmark"></span>
                  </label>
              </div>
          </div> 
          <div class="spacer"></div>
          <div class="spacer"></div>

    
          <label style="font-size: 16px;" for="income">How much do you earn <strong>monthly</strong>?</label>
          <input type="number" id="input_form" name="income" required>

          <div class="spacer"></div>
          <div class="spacer"></div>
          <div class="spacer"></div>

          <button type="submit"class="button" style="vertical-align:middle"><span style="font-size: 18px;">Calculate </span></button>
      </form>
    </div>
    <img id="bok_up" class="custom-image" src="Resources/Images/bok_up.png">
    <img id="grass" class="custom-image" src="Resources/Images/grass.png">
  

</body>
</html>
