<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact</title>
<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #333;
    color: white;
    text-align: center;
    padding: 50px;
  }

  h1 {
    margin-bottom: 30px;
  }

  a {
    color: white;
    text-decoration: none;
    border: 2px solid white;
    padding: 10px 20px;
    border-radius: 5px;
    display: inline-block;
    margin-bottom: 10px;
    transition: background-color 0.3s, border-color 0.3s;
  }

  a:hover {
    background-color: white;
    color: #333;
  }

  .back-to-home,
  .add-link,
  .delete-link {
    font-size: 20px;
    cursor: pointer;
    padding: 10px 20px;
    border-radius: 5px;
    background-color: #007bff;
    color: white;
    margin-bottom: 10px;
    transition: background-color 0.3s;
  }

  .back-to-home:hover,
  .add-link:hover,
  .delete-link:hover {
    background-color: #0056b3;
  }

  .back-to-home {
    position: fixed;
    top: 20px;
    left: 20px;
  }

  .add-link {
    position: fixed;
    bottom: 20px;
    left: 20px;
  }

  .delete-link {
    position: fixed;
    bottom: 20px;
    right: 20px;
  }

  .popup-overlay {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 999;
  }

  .popup {
    background-color: #333;
    color: white;
    padding: 20px;
    border-radius: 5px;
  }

  .popup input {
    margin-bottom: 10px;
    padding: 5px;
    width: 200px;
  }

  .popup button {
    padding: 8px 20px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: white;
    cursor: pointer;
  }

  .popup button:hover {
    background-color: #0056b3;
  }
</style>
</head>
<body>
  <a href="/" class="back-to-home">&larr; Home</a>
  <h1>Contact</h1>

  <?php
  
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
      if ($_POST["password"] === "Beta") {
          
          if (!empty($_POST["title"]) && !empty($_POST["url"])) {
              $file = fopen("links.txt", "a");
              fwrite($file, $_POST["title"] . "|" . $_POST["url"] . PHP_EOL);
              fclose($file);
          }
      } else {
          echo "Invalid password!";
      }
  }
  ?>

  <a href="https://nerimity.com/i/animehub">Contact with Nerimity</a><br>
  <a href="https://discord.gg/killua-lounge">Contact with Discord</a>

  <div class="popup-overlay" id="addLinkPopup" style="display: none;">
    <div class="popup">
      <h2>Add New Link</h2>
      <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="text" name="title" placeholder="Title" required><br>
        <input type="text" name="url" placeholder="URL" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <button type="submit">Add Link</button>
      </form>
    </div>
  </div>

  <div class="add-link">Add Link</div>
  <div class="delete-link">&#128465;</div>

  <script>
    document.querySelector('.add-link').addEventListener('click', function() {
      document.getElementById('addLinkPopup').style.display = 'flex';
    });

    document.querySelector('.delete-link').addEventListener('click', function() {
      alert('Implement delete link functionality here.');
    });
  </script>
</body>
</html>
