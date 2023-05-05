*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
    background-color: #24252a;

  }

  body{
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
h1{
    text-align: center;
}



    .text {
      color: white;
      font-family: 'Questrial', sans-serif;
    }

     /* стилистика для панели навигации */

  li, a, button{
    font-family: 'Work Sans', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color:#fbfcfd;
    text-decoration: none;
}

header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
}

.nav__links {
    list-style: none;
}

.nav__links li{
    display: inline-block;
    padding: 0px 20px;
}

.nav__links li a{
    transition: all 0.3s ease 0s;

}

.nav__links li a:hover{
    color: #0088a9

}

button{
      color: rgba(0, 136,168,169,1);
      padding: 10px 25px;
      background: transparent;
      border: 1px solid #fff;
      border-radius: 20px;
      outline: none;
      cursor: pointer;
      transition: all 0.3s ease 0s;
}

button:hover{
  background-color:#0088a9 ;
}

/*Стилистика для основного текста */

    body {
        font-family: 'Work Sans', sans-serif;
        font-size: 16px;
        line-height: 1.5;
        color: white;
        background-color: #f5f5f5;
        background-image: url(images/historybg.avif);
        }

    h1, h2, h3 {
    font-family: 'Questrial', sans-serif;
    font-weight: bold;
    text-align: center;
    }

    h1 {
        font-size: 36px;
        margin-top: 10px;
        margin-bottom: 10px; /* Updated */
        text-align: center;
    }

    info {
    margin-bottom: 0px;
    }

    .container {
    max-width: 960px;
    margin: 0 auto;
    padding: 50px;
    box-sizing: border-box;

    }

    .info {
    text-align: justify;
    margin-bottom: 100px;
    }


.text {
    color: white;
    font-family: 'Questrial', sans-serif;
}

/* стилистика для панели навигации */

li, a, button{
    font-family: 'Work Sans', sans-serif;
    font-weight: 500;
    font-size: 16px;
    color:#fbfcfd;
    text-decoration: none;
}

header{
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10%;
}

.nav__links {
    list-style: none;
}

.nav__links li{
    display: inline-block;
    padding: 0px 20px;
}

.nav__links li a{
    transition: all 0.3s ease 0s;

}

.nav__links li a:hover{
    color: #0088a9

}

button{
    color: rgba(0, 136,168,169,1);
    padding: 10px 25px;
    background: transparent;
    border: 1px solid #fff;
    border-radius: 20px;
    outline: none;
    cursor: pointer;
    transition: all 0.3s ease 0s;
}

button:hover{
    background-color:#0088a9 ;
}

/* стилистика для основной части*/

.overflow {
    display: flex;
    height: 88%;
    align-items: center;
    justify-content: center; 
}

.container {
    max-width: 960px;
    margin: 0 auto;
    padding: 20px; /* Updated */
    box-sizing: border-box;
}

.overlay {
    position: absolute;
    top: 55%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 15px;
    background-color: rgba(0, 0, 0, 0.7);
    color: #fff;
    font-size: 24px;
    font-weight: bold;
    text-align: center;
    text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.8);
}

.overlay h1 {
    color: #fff;
    font-size: 60px;
    font-family: 'Questrial', sans-serif;
    font-family: 'Work Sans', sans-serif;
}

/* стилистика для панели футера */

footer{
    position: relative;
    bottom: 0;
    left: 0;
    right: 0;
    background: #111;
    height: auto;
    width: 100vw;
    font-family: "Open Sans";
    padding-top: 40px;
    color: #fff;

}
.footer-content{
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    text-align: center;
}
.footer-content h3{
    font-size: 1.8rem;
    font-weight: 400;
    text-transform: capitalize;
    line-height: 3rem;
    font-family: 'Questrial', sans-serif;
    font-family: 'Work Sans', sans-serif;
}
.footer-content p{
    max-width: 500px;
    margin: 10px auto;
    line-height: 28px;
    font-size: 14px;
    font-family: 'Questrial', sans-serif;
    font-family: 'Work Sans', sans-serif;
}
.socials{
    list-style: none;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 1rem 0 3rem 0;
}
.socials li{
    margin: 0 10px;
}
.socials a{
    text-decoration: none;
    color: #fff;
}
.socials a i{
    font-size: 1.1rem;
    transition: color .4s ease;

}
.socials a:hover i{
    color: #0088a9 ;
}

.footer-bottom{
    background: #000;
    width: 100vw;
    padding: 20px 0;
    text-align: center;
}
.footer-bottom p{
    font-size: 14px;
    word-spacing: 2px;
    text-transform: capitalize;
}
.footer-bottom span{
    text-transform: uppercase;
    opacity: .4;
    font-weight: 200;
}
/*
    /* Стилистика для всплывающего меню */

.dropbtn {
    color: #ffffff;
    padding: 16px;
    font-size: 16px;
    border: none;

}

.dropdown {
    position: relative  ;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f1f1f100;
    min-width: 100px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: rgb(255, 255, 255);
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {color: #0088a9;}

.dropdown:hover .dropdown-content {display: block;}

.dropdown:hover .dropbtn {background-color: #00000000;}

.dropbtn:hover {
    color: #0088a9 ;
}
