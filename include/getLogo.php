<?php 
    //Logo request
    $get_logo = callAPI('GET', 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/info?symbol=BTC,ETH,XRP,BCH,EOS,XLM,LTC,USDT,ADA,XMR,TRX,DASH,MIOTA,BNB,NEO,ETC,XEM,XTZ,ZEC,VET,BTG,OMG,DOGE,MKR,ZRX,DCR,ONT,QTUM,LSK,NANO,ZIL,AE,BCD,BTS,BAT,SC,ICX,BCN,DGB,STEEM,NPXS,XVG,BTM,AOA,WAVES,TUSD,ETP,GNT,LINK,REP,STRAT,ETN,HOT,KMD,WTC,SNT,PPT,USDC,WAN,CNX,PAX,IOST,ARDR,MAID,MITH,NEXO,AION,KCS,DCN,RVN,LRC,ARK,DGTX,PIVX,HC,VERI,DGD,POLY,RDD,ELF,MANA,GXS,XET,BNT,HT,QASH,FUN,MONA,WAX,MGO,LOOM,MCO,CMT,DAI,ZEN,NAS,DROP,PAY,R,MOAC,THETA', false);
    $responseLogo = json_decode($get_logo, true);

    //Storing all slugs
    $symbolArray = array();
    foreach($responseLogo["data"] as $value){
      $symbolArray[] = $value["slug"];
    }

    //Storing all logos
    $logoArray = array();
    foreach($responseLogo["data"] as $value){
      $logoArray[] = $value["logo"];
    }

    /* Insert SLUG into DATABASE
    foreach($combinedArray as $key => $value){
             $sql = "INSERT INTO ico_images(SLUG, URL) VALUES('$key', '$value')";

             mysqli_query($conn, $sql);
          }
          if(!mysqli_query($conn,$sql))
           {
               die('Error : ' . mysqli_error($conn));
           }
           else{
             echo "URL data added to database";
    }
    */
?>