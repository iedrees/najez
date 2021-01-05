<style>
    @page normal {
        header: '';
        footer: page-footer;
        margin-top: 0px;
        margin-bottom: 100px;
        margin-left: 0px;
        margin-right: 0px;
    }

    @page full {
        margin-top: 0px;
        margin-bottom: 0px;
        margin-left: 0px;
        margin-right: 0px;
        header: '';
        footer: '';
    }

    section.normal { page: normal; page-break-before: always; }
    section.full { page: full; page-break-before: always; }

    
    .page {
        height: 29.7cm;
        width: 21cm;
        direction: rtl;
        font-family: 'din2';
        font-size: 24px;
    }
     .cover-1{
        padding: 10px;
    }
    .cover-1-title{
        margin-top: 750px;
        margin-right: 120px; 
        text-align: right;
        font-size: 34px;
        font-family: 'din2';
        color:#000;
        width: 550px;

    }
    .cover-1-title-bold {
        font-weight: bold;
    }
    .cover-1-date{
        margin-top: 17%;
        font-size: 22px;
    }

    .cover-2{
        padding: 10px;
    }

    .cover-2-title{
        margin-top: 870px;
        margin-right: 120px; 
        text-align: right;
        font-size: 44px;
        font-family: 'din2';
        color: #333;
        font-weight: bold;
    }

  
    .header-container-1{
        width:100%; 
        float:left;
        padding: 10px;
    }

    .header-container-1 .col1{
        width: 6%; 
        float: left;
    }

    .header-container-1 .col2{
        width: 87%; 
        float: left;
    }

    .header-1-title{
        font-size: 40px;
        font-weight: bold;
        margin-right: 140px;
        margin-top: 70px;
    }


    .header-container-2{
        width:100%; 
        float:left;
        padding: 10px;
        margin-top: 10px;
    }

    .header-container-2 a{
        text-decoration: none;
        color: navy;
        font-weight: bold;
        font-family: 'din2';
    }

    .header-container-2 .col1{
        width: 6%; 
        float: left;
    }

    .header-container-2 .col2{
        width: 84%; 
        float: left;
        padding-top: 40px;
    }

    .header-container-2 .col3{
        width: 70%; 
        float: left;
        color: navy;
        font-weight: bold;
        font-size: 18px;
        padding-top: 20px;
        padding-left: 20px;
    }

    .header-container-2 .col4{
        width: 25%; 
        float: left;
    }
    .ils {
       width: 96%;
       /* float:right; */
   }
   .ils div {
       padding-right: 80px;
       padding-top: 50px;
   }
   .ils div p{
       color:#333;
       margin: 0px 10px 10px 10px;
       font-family:'din2';
       font-weight:bold;
   }
   .ils div p span{
       color:#333 !important;
   }
   .ils div p a{
       color:#333;
       text-decoration: none;
   }

   .tob-header{
        font-size: 25px;
        font-weight: bold;
    }

    .tob-header a{
        text-decoration: none;
        font-weight: bold;
        color: #000;
    }

    .tob-sub{
        font-size: 17px;
    }

    .source-info{
        color: gray;
        font-size: 14px;
        padding-right: 140px;
        font-weight: bold;
    }

    .normal{
        box-decoration-break: clone;
    }
    .content-text{
        color: black;
        font-size: 18px;
        width: 900px;
        padding: 20px 50px 50px 50px;   
        background: white;  
        box-decoration-break:clone;
        overflow:wrap;
        white-space: pre-line;

    }
    .content-text, .content-text p {
        margin-top: 5px;
        margin-bottom: 5px;
        padding-top: 6px; 
        padding-bottom: 6px; 
    }

    .footer-containter{
        width: 46px;
        text-align: center;
        margin-left: 70px;
        padding-top: 45px; 
    }

    .page-no{
        font-family: Arial, Helvetica, sans-serif;
        font-weight: bold;
        color: white;
        font-size: 16px;
    }

    .block{
        display: block;
    }

    table{
        width: 100%
    }
    table td {
        padding: 7px;
    }
    table tbody tr {
        page-break-before: avoid;
    }
    table thead tr {
        background:rgb(215, 215, 215);  
        font-size: 18px;
        font-weight: bold;
    }
    .title {
        font-size: 28px;
        color: rgb(52, 32, 109);
    }
    .subtitle {
        color: cadetblue;
    }
</style>