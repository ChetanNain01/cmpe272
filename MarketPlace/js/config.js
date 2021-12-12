function getConfig() {
  return {
    hostName: `http://${window.location.host}/MarketPlace`,
    webApps: [
      {
        name: "Pullo",
        url: "http://cmpe272.me/pullo",
        thumbnail: `images/Homepage.png`,
      },
      {
        name: "Fitness",
        // url: "http://localhost/CMPE272-Lab/price.php",
        url: "https://rs1215.me/price.php",
        thumbnail: `images/banner-bg.png`,
      },
      {
        name: "Pullo",
        url: "http://localhost:8666/Pullo",
        thumbnail: `https://media.gq.com/photos/60f9c697101cc04fad71e5cf/master/pass/BEST-BASICS-1.jpg`,
      },
      {
        name: "Pullo",
        url: "http://localhost:8666/Pullo",
        thumbnail: `https://media.gq.com/photos/60f9c697101cc04fad71e5cf/master/pass/BEST-BASICS-1.jpg`,
      },
    ],
  };
}
