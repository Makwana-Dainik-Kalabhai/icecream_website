<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
</head>

<style>
    * {
        margin: 0;
        padding: 0;
    }

    div {
        outline: 3px solid #ef000f;
        outline-offset: 5px;
        text-align: center;
        height: 300px;
        width: 400px;
        color: white;
        margin: 50px auto;
        padding: 40px;
        border-radius: 5px;
        background: linear-gradient(to top left, #f2f2f2 1%, #ef000f);
    }

    h1 {
        font-size: 35px;
    }

    input[type='text'] {
        color: white;
        margin: 30px 10px;
        width: 90%;
        outline: none;
        border: none;
        background-color: transparent;
        border-bottom: 3px solid white;
        padding: 10px 0px;
        font-size: 20px;
    }
    input::placeholder {
        color: white;
    }

    input[type='submit'] {
        color: white;
        font-weight: 700;
        background-color: transparent;
        font-size: 20px;
        margin-left: -80px;
        border: none;

    }
</style>

<body>
    <div>
        <h1> Search Programming Languages </h1>
        <input type="text" name="search" list="suggestion" placeholder="Search Here...">

        <datalist id="suggestion">
        <option value="Python">Python</option>
        <option value="PHP">PHP</option>
        <option value="Java">Java</option>
        <option value="C++">C++</option>
        <option value="Javascript">Javascript</option>
        </datalist>
        
        <input type="submit" value="Search" />
    </div>
</body>

</html>