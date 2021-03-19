<!-- source: https://gist.github.com/growdigital/85849dba5e43373d8ea395513c0abc1a  modified -->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>HTML by Adam Morse, mrmrs.cc</title>
  </head>  
  <body onload="showCookie">
    <section>
      <h1 class="other-class">Forms</h1>
      <div id="div-cookies">
        <?php echo json_encode($_COOKIE); ?>
        <script>
          document.write(document.cookie);
        </script>
      </div>
      <form action="form-result.php" method="post">
        <fieldset>
          <!--
        Every fieldset must contain a legend. IE barfs if it's not there.
        It's no fun.
        -->
          <legend>Legend Example</legend>

          <div>
            <label>Text Input Label</label>
            <input required name="some_input_name" type="text" />
            <p class="test-class">Helper text if necessary.</p>
          </div>

          <div>
            <label>Password</label>
            <input type="password" />
            <p class="test-class">Error messages when appropriate.</p>
          </div>

          <div>
            <label for="first-name">First Name</label>
            <input type="text" value="John" id="first-name" />
          </div>

          <div>
            <label for="last-name">Last Name</label>
            <input type="text" id="last-name" />
          </div>

          <div>
            <label for="email">Email</label>
            <input type="email" id="email" />
          </div>

          <div>
            <label for="gender">Dropdown</label>
            <select id="option-element">
              <option value="option-1">Option 1</option>
              <option value="option-2">Option 2</option>
              <option value="option-3">Option 3</option>
            </select>
          </div>

          <div>
            <label for="gender">Dropdown</label>
            <select id="option-element-m" multiple>
              <option value="option-1">Option 1</option>
              <option value="option-2">Option 2</option>
              <option value="option-3">Option 3</option>
            </select>
          </div>

          <div>
            <label>Radio Buttons</label>
            <ul>
              <li>
                <label><input type="radio" name="radio" required /> Label 1</label>
              </li>
              <li>
                <label><input type="radio" name="radio" /> Label 2</label>
              </li>
              <li>
                <label><input type="radio" name="radio" /> Label 3</label>
              </li>
            </ul>
          </div>

          <div>
            <label for="url">URL Input</label>
            <input type="url" placeholder="http://mrmrs.cc" />
          </div>

          <div>
            <label>Text area</label>
            <textarea required></textarea>
          </div>

          <div>
            <label><input required type="checkbox" /> This is a checkbox.</label>
          </div>

          <div>
            <input id="submit-button" type="submit" value="Submit" />
          </div>
        </fieldset>
      </form>
    </section>
    <script>
      setTimeout(function(){ document.getElementById("first-name").value = "Adam"; }, 3000);
    </script>
  </body>
</html>

