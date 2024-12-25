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
    nav {
        width: 100%;
        display: flex;
        justify-content: space-evenly;
        margin: 0px 0px 5px 0px;
        line-height: 4;
    }
    a {
        color: white;
        font-size: 20px;
        text-decoration: none;
        text-shadow: 3px 5px 1px red;
    }
    a:hover {
        font-weight: 900;
    }
    #nav1 {
        background: linear-gradient(rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.3));
    }

    #nav2 {
        /* with direction */
        background: linear-gradient(to bottom right, white, black);
    }

    #nav3 {
        /* With multiple colors */
        background: linear-gradient(pink, lightblue, lightgreen, yellow);
    }
    #nav4 {
        border: 1px solid black;
        /* With repeating-linear-gradient */
        background: repeating-linear-gradient(#f2f2f2 10px, #282a35, black);
    }
    #nav5 {
        background: radial-gradient(rgba(0, 0, 0, 0.05), rgba(0, 0, 0, 0.3));
    }


    div {
        width: 50%;
        height: 300px;
    }
    #div1 {
        background: radial-gradient(circle, red, yellow, green);
    }
</style>
<body>
    <nav id="nav1">
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
    </nav>
    <nav id="nav2">
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
    </nav>
    <nav id="nav3">
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
    </nav>
    <nav id="nav4">
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
    </nav>
    <nav id="nav5">
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
        <a href="">ABCD</a>
    </nav>
    <div id="div1"></div>
</body>
</html>