<div x-data="{

    cartOpen: false,
    isOpen: false,
    articleId:@entangle('articleId').defer,
    lesArticles:@entangle('lesArticles').defer,
    lescodes:@entangle('lescodes').defer,
    codeCommande:@entangle('codeCommande').defer,
    userId:@entangle('userId').defer,
    prixCommande:@entangle('prixCommande').defer,
    quantiteCommande:@entangle('quantiteCommande').defer,
    lesCategories:@entangle('lesCategories').defer,
    libelle:'',
    prix:'',
    stock:'',
    photo:'',
    nombre:1,


    boolModal:false,

    searchTerm: '',
    searchTermC:'',
    filterItems(id) {
        console.log(this.lesCategories)

        const result= Object.values(this.lesCategories).filter(item => item.id === id)
        this.searchTermC=result[0].libelle
        this.searchTerm = this.searchTermC
        this.searchTermC=''
        console.log(this.searchTermC)
    },

    checkSearch(){
        this.searchTerm = this.searchTermC
        console.log(this.searchTermC)
    },


    incrementeNombre(){
        if (this.nombre>=1) {
            this.nombre++
            this.prixCommande = this.prix
            this.prixCommande = this.prix * this.nombre
        }

    },

    decrementeNombre(){
        if (this.nombre>=2) {
            this.nombre--
            this.prixCommande = this.prix
            this.prixCommande = this.prix * this.nombre
        }

    },

    getRandomCode() {
        return Math.floor(Math.random() * 9000000000) + 1000000000;
    },

     isCodeUnique(code,lescodes) {
        const str = code.toString();
        const val = Object.values(lescodes);
        return !val.includes(str);
    },

    generateCode() {
      // Si vous avez déjà des codes existants, vous pouvez les stocker dans le tableau existingCodes

      let generatedCode = this.getRandomCode();
      while (!this.isCodeUnique(generatedCode, this.lescodes)) {
        generatedCode = this.getRandomCode();
      }

      this.codeCommande = generatedCode;
    },

    Commande(userid){
        this.userId = userid
        this.quantiteCommande= this.nombre
        this.generateCode()
        console.log(this.userId)
        this.EnregisterData()
    },

    ResearchArticle(id){

        const result= Object.values(this.lesArticles).filter(item => item.id === id)

        this.boolModal=!this.boolModal
        console.log(this.boolModal)
        this.libelle=result[0].nom
        this.prix=result[0].prix
        this.stock=result[0].stock
        this.photo=result[0].photo
    this.prixCommande = this.prix
    this.articleId = id
        if(!this.boolModal){
                this.prixCommande = this.prix
                this.nombre = 1
            }
    },

    EnregisterData: async function(){
                await @this.addCommande().then(value => {
                    data = JSON.parse(value);
                });
            }


}">



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>shop - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
    <style type="text/css">
        body {
    background-color: #EAEAEA;
    font-family: 'Roboto', sans-serif;
}
.wrap {
    max-width: 940px;
    margin: 0 auto ;
}


/*Menu !!!!*/
.menu {
    vertical-align: top;
    display: inline-block;
    margin: 10px ;

}
.menu-item {
    background-color: #FEFEFE;
    width: 200px;
    height: 150px;
    margin: 10px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
}

.header-item {
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #3C3D41  ;
    font-size: 11px;
    padding: 15px 15px;
    border-bottom: 1.5px solid #EAEAEA;
}

.color-row1,  .color-row2  {
    margin: 15px;
    padding:0;
    max-width: 220px;
}

.color-circle {
    max-width: 220px;
    display: inline-block;
    width: 30px;
    height: 30px;
    border-radius: 50px 50px 50px 50px;

}

.size-circle {
    background-color: #EBEBEB;

}

.sizedouble {

   margin: 5px 5px;

}
.size {
     margin: 6px 8px;
}

/*ITEMS!!!*/
img {
    width: 100px;
    height: 130px;
    margin-top: 10px;
    vertical-align: top;
    position: relative;
    left: 50px;
}

.items  {
    width: 650px;
    margin: 5px;
    display: inline-block;
}
 .item {
    vertical-align: top;
    width: 190px;
    height: 240px;
    margin: 8px;
    background:#FEFEFE;
    display: inline-block;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
 }

h3 {
    text-align: center;
    margin-bottom: 5px;
    margin-left: 5px;
    margin-right: 5px;
    font-size: 1em;
}

h5 {
    position: relative;
    bottom: 10px;
    text-align: center;
    margin-top: 20px;
}

.descroption {
    margin: 0;
    text-align: center;
    font-size: 11px;
    font-style: italic;
    color: grey;
    font-family: sans-serif;
}


/*BTN*/
.loadmore {
    height: 30px;
    width: 610px;
    margin-top: 25px;
    position: relative;
    left: 8px;
    text-decoration: none;
    font-size: 15px;
    background-color: #B8C6C7;
    color: #FEFEFE;
    border-radius: 4px;
    border: none;
    font-family: 'Roboto', sans-serif;
}

.mini-menu{
    width: 200px;
    border-radius: 3px;
    box-shadow:0 0 8px rgba(0, 0, 0, 0.06);
    overflow: hidden;
    letter-spacing: 2px;
    text-transform: uppercase;
    color: #848C8F ;
    font-size: 11px;
    margin: 10px;
}
.mini-menu ul {
    list-style: none;
    margin: 0;
    padding:0;
    text-align:left;
}
.mini-menu > ul > li {
    position: relative;
}
.mini-menu > ul > li > a {
    display: block;
    outline: 0;
    padding: 1.2em 1em;
    text-decoration: none;
    color:#3C3D41;
    font-weight: normal;
    letter-spacing: 2px;
    background: #FEFEFE;
    border-bottom: 1.5px solid #EAEAEA;

}

.mini-menu .sub > ul {
    height: 0;
    overflow: hidden;
    background: #848C8F;
}
.mini-menu .sub > ul > li > a {
    font-family:  sans-serif;
    color:#FEFEFE;
    font-size: 12px;
    display: block;
    text-decoration: none;
    padding: .7em 1em;
    text-transform: capitalize;
    font-style: normal;
    letter-spacing: 1px;
}
/*.mini-menu .sub > ul > li > a:hover,*/
.mini-menu .sub > a.active,
 {
    padding-left: 1.3em;
    color: blue;
    content: "1";
    float: right;
    margin-right:6px;
    line-height: 12px;
}
.mini-menu .sub >  a:after{
    content: "»";
    float: right;
    margin-right:6px;
    line-height: 12px;
}

@media screen and (max-width: 940px) {
    .items {width: 420px;}
    .wrap {width: 700px;}
    .loadmore{width: 420px;}
   }
   @media screen and (max-width: 720px) {
    .items {width: 220px;}
    .wrap {width: 500px;}
    .loadmore{width: 220px;}
   }


   .ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 0.9em;
    height: 1.6em;
    cursor: default;
    outline: none;
    border: 1px solid rgb(207, 207, 207);
    background: #090;
    border-image: initial;
}
    </style>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/6.0.0/normalize.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <title>Document</title>
</head>
<body>

    <div :class="cartOpen ? 'translate-x-0 ease-out' : 'translate-x-full ease-in'" class="fixed right-0 top-0 max-w-xs w-full h-full px-6 py-4 transition duration-300 transform overflow-y-auto bg-white border-l-2 border-gray-300">
        <div class="flex items-center justify-between">
            <h3 class="text-2xl font-medium text-gray-700">Mon Panier</h3>
            <button @click="cartOpen = !cartOpen" class="text-gray-600 focus:outline-none">
                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
        </div>
        <hr class="my-3">
        <div class="flex justify-between mt-6">
            <div class="flex">
                <img class="h-20 w-20 object-cover rounded" x-bind:src="photo" alt="">
                <div class="mx-3">
                    <h3 class="text-sm text-gray-600" x-text="libelle"></h3>
                    <div class="flex items-center mt-2">
                        <button x-on:click='incrementeNombre()' class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                        <span class="text-gray-700 mx-2" x-text="nombre" >2</span>
                        <button x-on:click="decrementeNombre()" class="text-gray-500 focus:outline-none focus:text-gray-600">
                            <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M15 12H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        </button>
                    </div>
                </div>
            </div>
            <span class="text-gray-600" x-text="prixCommande"></span><span class="text-gray-600">fcfa</span>
        </div>

        <div class="mt-8 ">
            <form class="flex items-center justify-center">
                <input class="form-input w-48" type="text" placeholder="Add promocode">
                <button class="ml-3 flex items-center px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                    <span>Apply</span>
                </button>
            </form>
        </div>
        <a class="flex items-center justify-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
            <span x-on:click="Commande({{ Auth::user()->id }})">Passer la commande</span>
            <svg class="h-5 w-5 mx-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M17 8l4 4m0 0l-4 4m4-4H3"></path></svg>
        </a>
    </div>

<div class="wrap">
    <div class="menu">
        <div class="mini-menu">
            <ul>
                @foreach ($lesCategories as $categorie )
                        <li class="sub">
                            <a x-on:click="filterItems({{  $categorie['id'] }})">{{ $categorie['libelle'] }}</a>
                            <ul>
                            <li><a href="#">Jackets</a></li>
                            <li><a href="#">Blazers</a></li>
                            <li><a href="#">Suits</a></li>
                            <li><a href="#">Trousers</a></li>
                            <li><a href="#">Jenas</a></li>
                            <li><a href="#">Shirts</a></li>
                            </ul>
                        </li>
                @endforeach
            </ul>
        </div>
        <div class="menu-colors menu-item">
            <div class="header-item" >Colors</div>
            <ul class="color-row1">
                <li class="color-circle" style="background:#4286f4"></li>
                <li class="color-circle" style="background:#2acc4b"></li>
                <li class="color-circle" style="background:#343534"></li>
                <li class="color-circle" style="background:#5f605f"></li>
                <li class="color-circle" style="background:#929392"></li>
            </ul>
            <ul class="color-row2">
                <li class="color-circle" style="background:#9e8045"></li>
                <li class="color-circle" style="background:#d3d3d3"></li>
                <li class="color-circle" style="background:#6b6666"></li>
                <li class="color-circle" style="background:#999797"></li>
                <li class="color-circle" style="background:#923476"></li>
            </ul>
        </div>
        <div class="menu-size menu-item">
            <div class="header-item" >Size</div>
            <ul class="color-row1">
                <li class="color-circle size-circle" ><p class="sizedouble">XS</p></li>
                <li class="color-circle size-circle" style="background-color:#343534" ><p style="color:#999" class="size">S</p></li>
                <li class="color-circle size-circle" ><p class="size">M</p></li>
                <li class="color-circle size-circle" ><p class="size">L</p></li>
                <li class="color-circle size-circle" ><p class="sizedouble">XL</p></li>
            </ul>
        </div>
        <div class="menu-price menu-item">
            <div class="header-item" >Price</div>
            <p>
                <!--<label for="amount">Price range:</label>-->
                <input type="text" readonly id="amount"  style="border:0; color:#f6931f; font-weight:bold;">
            </p>
            <div id="slider-range"></div>
        </div>

    </div>

    <div class="items">

  <div class="items">
    <template x-for="article in lesArticles">
        <div x-on:click="ResearchArticle(article.id)"   @click="cartOpen = !cartOpen"  x-show="(article.nom.toLowerCase().includes(searchTerm.toLowerCase()) || article.categorie.libelle.toLowerCase().includes(searchTerm.toLowerCase()))"  data-price="290" class="item">
            <img x-bind:src="article.photo" class="img-item"></img>
                <div class="info">
                    <h3 x-text="article.nom"></h3>
                    <h5 x-text="article.prix">$290</h5>

                </div>
        </div>
    </template>

        <div data-price="900" class="item">
            <img src="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSS8oEITt9vJtsCPRH0mvi2pRf8YZfN6YnkASdjsibLyayVVlidSUwG64QIWw" alt="jacket" class="img-item" ></img>
                <div class="info">
                    <h3>Our Legacy Splash Jacquard Knit</h3>
                    <p class="descroption">Black Grey Plants</p>
                    <h5>$900</h5>
                </div>
        </div>

    </div>
 <button class="loadmore">Load More</button>
    </div>
</div>

</body>

    <!--<script
  src="https://code.jquery.com/jquery-3.2.1.min.js"
  integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
  crossorigin="anonymous"></script>-->





    <!--Menu-->
  <script type="text/javascript">
    $(document).ready(function () {
        $(".sub > a").click(function() {
            var ul = $(this).next(),
                    clone = ul.clone().css({"height":"auto"}).appendTo(".mini-menu"),
                    height = ul.css("height") === "0px" ? ul[0].scrollHeight + "px" : "0px";
            clone.remove();
            ul.animate({"height":height});
            return false;
        });
           $('.mini-menu > ul > li > a').click(function(){
           $('.sub a').removeClass('active');
           $(this).addClass('active');
        }),
           $('.sub ul li a').click(function(){
           $('.sub ul li a').removeClass('active');
           $(this).addClass('active');
        });
    });
</script>
<script src="script.js" ></script>
</html>
<script>
    $( function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 1000,
      values: [ 190, 728 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
         var mi = ui.values[0];
              var mx = ui.values[1];
              filterSystem(mi, mx);
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );


  function filterSystem(minPrice, maxPrice) {
      $(".items div.item").hide().filter(function () {
          var price = parseInt($(this).data("price"), 10);
          return price >= minPrice && price <= maxPrice;
      }).show();
  }

//   $( "#slider-range" ).on( "slidechange", function( event, ui ) {
//     console.log(ui.value);
// } );
</script>
<script type="text/javascript">

</script>
</body>
</html>

</div>
