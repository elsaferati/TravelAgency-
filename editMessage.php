<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Message</title>
    <style>
        /* Add the same button styling from above */
        button, a.button {
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            text-decoration: none;
        }

        button:hover, a.button:hover {
            background-color: #4CAF50;
            color: #fff;
        }

        button.delete, a.delete {
            background-color: #f44336;
            color: white;
        }

        button.delete:hover, a.delete:hover {
            background-color: #e53935;
        }

        button.edit, a.edit {
            background-color: #008CBA;
            color: white;
        }

        button.edit:hover, a.edit:hover {
            background-color: #007bb5;
        }
    </style>
</head>
<body>

<h2>Edit User Message</h2>

<form action="editMessage.php?id=<?php echo $id; ?>" method="POST">
    <label for="user">Name:</label>
    <input type="text" id="user" name="user" value="<?php echo htmlspecialchars($row['user']); ?>" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($row['email']); ?>" required>

    <label for="message">Message:</label>
    <textarea id="message" name="message" rows="4" required><?php echo htmlspecialchars($row['message']); ?></textarea>

    <button type="submit" class="button">Update Message</button>
</form>

</body>
</html>

