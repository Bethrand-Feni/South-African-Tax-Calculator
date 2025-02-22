<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Calculator</title>
    <link rel="stylesheet" href ="styles.css">
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
