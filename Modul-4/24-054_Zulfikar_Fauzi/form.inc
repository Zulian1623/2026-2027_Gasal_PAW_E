
<h2>Form Data Pribadi</h2>

<form action="form.php" method="POST">
    <label>Surname:</label><br>
    <input type="text" name="surname"
           value="<?php echo htmlspecialchars($_POST['surname'] ?? ''); ?>">
    <br><br>

    <label>Email address:</label><br>
    <input type="email" name="email"
           value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
    <br><br>

    <label>Password:</label><br>
    <input type="password" name="password">
    <br><br>

    <label>Street Address:</label><br>
    <textarea name="address"><?php
        echo htmlspecialchars($_POST['address'] ?? '');
    ?></textarea>
    <br><br>

    <label>State:</label><br>
    <select name="state">
        <option value="South Australia">South Australia</option>
        <option value="Victoria">Victoria</option>
        <option value="Queensland">Queensland</option>
        <option value="Western Australia">Western Australia</option>
    </select>
    <br><br>

    <input type="hidden" name="country" value="Australia">

    <label>Gender:</label><br>
    <input type="radio" name="gender" value="Male"> Male
    <input type="radio" name="gender" value="Female"> Female
    <br><br>

    <input type="checkbox" name="vegetarian" value="Yes">
    Vegetarian?
    <br><br>

    <button type="submit">Submit</button>
    <button type="reset">Reset</button>
</form>
