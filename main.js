const playIcons = {
    beat: document.querySelectorAll(".play"),
    song: document.querySelectorAll("#song .play"),
    modal: document.querySelector(".swiper-overlay")

};

const audios = document.querySelectorAll("audio");


const indexes = {
    playingAudio: null,
    modalIndex: null,

}

const beatItems = {
    beatIds: [document.querySelectorAll("#beat-id"), document.querySelectorAll(".premium #beat-id"), document.querySelectorAll(".free #beat-id")],
    beatCategorys: [document.querySelectorAll(".product-item")],

}

const modalItems = {
    modalImg: document.querySelector("#modal-img-full"),
    modalTitle: document.querySelector("#modal-title"),
    modalPrice: document.querySelector("#modal-price"),
    modalDiscount: document.querySelector("#old-price"),
    modalLeaseType: document.querySelector("#lease-type"),
    modalCurrent: document.querySelector(".selector-wrap .current"),
    modalSelect: document.querySelector(".selector-wrap"),
    modalSaved: {
        leaseType: [],
        Price: {
            mainPrice: [],
            discount: []
        },
        id: []
    },
    leaseinfo: document.querySelector(".lease-info"),
    leaseinfos: null,
    modalContainer: document.querySelector(".modal")
}

const cartItems = {
    cartIcons: document.querySelectorAll(".product-item .add-to-cart"),
    cartIcons2: document.querySelectorAll(".custom-circle-btn"),
    cartList: document.querySelector('.minicart-list'),
    cartQuantities: document.querySelectorAll(".quantity"),
    cartAmount: document.querySelector(".amount"),
    addedToCart: [],
    oldPrice: [],
    addedCartIcon: []
}
const modalLeaseInfos = {
    beat: {
        basic: ["Mp3 Version - Untagged", "5000 Max. Sales For Profit", "Producer owns right", "Commercial use", "Non-Exclusive"],

        exclusive: ["Mp3 and Wav Version - Untagged", "10000 Max. Sales For Profit", "Producer owns right", "Commercial use", "Non-Exclusive"],

        premium: ["Mp3 Wav and Stems Version - Untagged", "Unlimited Max. Sales For Profit", "100% Royalty Free", "Commercial use", "Non-Exclusive"]

    },

    sample: ["Sample Version", "5000 Max. Sales For Profit", "Producer owns right", "Commercial use", "Non-Exclusive"],

    lyrics: {
        basic: ["Lyrics File", "5000 Max. Sales For Profit", "Song writer owns right", "Non Commercial use", "Non-Exclusive"],

        exclusive: ["Lyrics File", "10000 Max. Sales For Profit", "Song writer owns right", "Commercial use", "Non-Exclusive"],

        premium: ["Lyrics", "Unlimited Max sales", "Full Ownership", "Commercial use", "Non-Exclusive"]
    },

    song: {
        basic: ["Audio + Lyrics", "5000 Max. Sales For Profit", "Song writer owns right", "Non Commercial use", "Non-Exclusive"],

        exclusive: ["Audio + Lyrics", "10000 Max. Sales For Profit", "Song writer owns right", "Commercial use", "Non-Exclusive"],

        premium: ["Audio + Lyrics", "Unlimited Max sales", "Full Ownership", "Commercial use", "Non-Exclusive"]
    }
}

let name, beatPrice, beatImage, leaseType, id, userId, cartIcon, productItem, productType;

// if (!localStorage.getItem("user")) {
//     let rand = Math.floor(Math.random() * 1000);
//     userId = localStorage.setItem("user", "user" + rand);
//     userId = localStorage.getItem("user");

// } else {
//     userId = localStorage.getItem("user");

// }

userId = document.querySelector("#user").value;

//Playing Multiple beat items
playIcons.beat.forEach((playIcon, index) => {
    playIcon.addEventListener("click", () => {
        PlayBeat(playIcon, playIcons.modal, true)


    })
})


//Playing Single beat item(Modal)
playIcons.modal.onclick = function () {

    PlayBeat(indexes.playingAudio, playIcons.modal, false);
}



// Adding to cart for multiple beat items
cartItems.cartIcons.forEach((cartIcon, index) => {
    cartIcon.onclick = () => {
        name = cartIcon.dataset.name;
        id = cartIcon.dataset.id
        const addedid = modalItems.modalSaved.id.find(item => item == id);
        if (addedid == undefined) {
            beatPrice = cartIcon.dataset.price;
            leaseType = "Basic Lease";
            modalItems.modalSaved.Price.mainPrice.push(beatPrice)
            modalItems.modalSaved.leaseType.push(leaseType)
            modalItems.modalSaved.id.push(id)

        } else {
            beatPrice = modalItems.modalSaved.Price.mainPrice[modalItems.modalSaved.id.indexOf(id)];
            leaseType = modalItems.modalSaved.leaseType[modalItems.modalSaved.id.indexOf(id)];
        }


        productItem = document.querySelector(`.product-item[data-id='${id}']`)
        productType = productItem.dataset.type
        beatImage = cartIcon.dataset.image;


        if (productType == "sample" || productType == "lyrics") {
            leaseType = "";
        }

        if (!cartIcon.classList.contains("download")) {

            addToCart(cartIcon.children[0], name, beatPrice, leaseType, beatImage, productType, id)
        }

    }
})



// Adding to cart for single beat item
cartItems.cartIcons2.forEach(carticon => {
    carticon.onclick = () => {


        name = modalItems.modalTitle.innerHTML
        beatPrice = modalItems.modalPrice.innerHTML.replace("$", "")
        beatImage = modalItems.modalImg.getAttribute("src").split("/")[4];
        productItem = document.querySelector(`.product-item[data-id='${id}']`)
        productType = productItem.dataset.type
        cartIcon = productItem.querySelector(".add-to-cart i")
        leaseType = modalItems.modalLeaseType.value;



        if (productType == "sample") {
            leaseType = "";
        }


        if (!carticon.classList.contains("download")) {


            addToCart(cartIcon, name, beatPrice, leaseType, beatImage, productType, id)

        }

    }
})


//Clicking multiple beat Items
beatItems.beatCategorys[0].forEach((beatCategory, index) => {

    beatCategory.onclick = () => {

        id = beatCategory.dataset.id
        allItems(beatCategory, beatCategory.dataset.id);


    }
})

function PlayBeat(playIcon, modal, state) {
    let audio = document.querySelector(`.product-item[data-id='${playIcon.dataset.id}'] audio`)
    if (playIcon.children[0].classList == "entypo-icon-controller-play") {
        let playing = document.querySelector("audio.playing")

        audio.play();
        document.querySelectorAll(`.play[data-id='${playIcon.dataset.id}']`).forEach(play => {
            play.children[0].classList.replace("entypo-icon-controller-play", "entypo-icon-controller-stop")
        })

        modal.children[0].classList.replace("entypo-icon-controller-play", "entypo-icon-controller-paus")

        // Ensuring more than one audio is not played at once
        if (playing != null) {
            // Pausing other beats
            playing.load()
            // Changing icon of paused
            let icons = document.querySelectorAll(`.product-item[data-id='${playing.dataset.id}'] .play i`);
            icons.forEach(icon => {
                icon.classList.replace("entypo-icon-controller-stop", "entypo-icon-controller-play");
            })


            playing.classList.remove("playing");
            playing.removeAttribute("data-id");

        }
        audio.classList.add("playing");
        audio.setAttribute("data-id", playIcon.dataset.id);


    } else {
        // Pausing beat if icon was stop icon or pause icon
        if (state == true) {
            audio.load()

        } else {
            audio.pause()

        }
        document.querySelectorAll(`.play[data-id='${playIcon.dataset.id}']`).forEach(play => {
            play.children[0].classList.replace("entypo-icon-controller-stop", "entypo-icon-controller-play")
        })

        modal.children[0].classList.replace("entypo-icon-controller-paus", "entypo-icon-controller-play");
        audio.classList.remove("playing");
        audio.removeAttribute("data-id");


    }


}


// Function that handles items i.e beat,sample,lyrics and song items
function allItems(beatCategory, item_id) {
    let type;
    indexes.playingAudio = document.querySelector(`.play[data-id='${beatCategory.dataset.id}'] `)
    type = beatCategory.dataset.type;
    const CartItems = [...cartItems.cartList.children]

    if (CartItems.find(item => item.id == beatCategory.dataset.id || item.id.replace("li_", "") == beatCategory.dataset.id)) {
        cartItems.cartIcons2[0].children[0].classList.add("cart-list-active");
    } else {
        cartItems.cartIcons2[0].children[0].classList.remove("cart-list-active");
    }



    // If item was a beat item
    if (beatCategory.dataset.type == "beat" || beatCategory.dataset.type == "song") {
        let play = document.querySelector(`.product-item[data-id='${item_id}'] .play i`);


        // DIsplaying playIcon on modal only if audio is playing
        if (play.classList.contains("entypo-icon-controller-play")) {

            playIcons.modal.children[0].classList.replace("entypo-icon-controller-paus", "entypo-icon-controller-play");
        } else {
            playIcons.modal.children[0].classList.replace("entypo-icon-controller-play", "entypo-icon-controller-paus");

        }


        playIcons.modal.children[0].style.display = "flex"
        // Getting Beat Item Info
        getImageAndTitle(item_id, type)

    } else {
        if (beatCategory.dataset.type == "sample") {
            modalItems.modalSelect.style.display = "none"
        } else {
            modalItems.modalSelect.style.display = "flex";
        }
        // Hiding Leasetype select

        playIcons.modal.children[0].style.display = "none"
        getImageAndTitle(item_id, type)


    }

}
// Function that gets image and title of beat and displays it on modal
async function getImageAndTitle(item_id, type) {


    let request = await fetch(`./handler.php?getinfo=${item_id} && itemType=${type}`);
    let result = await request.json();

    modalItems.modalImg.src = `./admin/Files/${type}/${result.beat_image}`;
    modalItems.modalTitle.innerHTML = result.beat_name;

    if (result.beat_category == "Free") {
        Free(type, result.beat_free_file, modalItems.modalTitle.innerHTML);
    } else {

        Premium(result.beat_discount, result.beat_basic_amount, result.beat_exclusive_amount, result.beat_premium_amount, modalItems.modalPrice, modalItems.modalDiscount, type, item_id)
    }



}

// FUnction for only free items
function Free(type, beatFile, beatName) {
    if (type == "beat") {
        modalItems.leaseinfos = ["Mp3 Version - Tagged", "2000 Max. Sales For Profit", "Producer owns right", "Commercial use", "Non-Exclusive"]
    } else if (type == "sample") {
        modalItems.leaseinfos = ["Sample Free Version", "2000 Max. Sales For Profit", "Producer owns right", "Commercial use", "Non-Exclusive", "Credit - i.e 'Prod. by alabah"]
        // Getting beat extension
        beatName = beatName + "." + beatFile.split(".")[1]
    } else if (type == "lyrics") {
        modalItems.leaseinfos = ["Lyrics Free Version", "2000 Max. Sales For Profit", "Song writer owns right", "Commercial use", "Non-Exclusive", "Credit - i.e 'Written by PG"]
        // Getting beat extension
        beatName = beatName + "." + beatFile.split(".")[1]
    } else if (type == "song") {
        modalItems.leaseinfos = ["Song  Free Version", "2000 Max. Sales For Profit", "Song writter owns right", "Commercial use", "Non-Exclusive", "Credit - i.e 'Written by PG"]
        // Getting beat extension
        beatName = beatName + "." + beatFile.split(".")[1]
    }




    // Hiding Leasetype select
    modalItems.modalSelect.style.display = "none"
    modalItems.modalPrice.innerHTML = "Free";
    cartItems.cartIcons2[1].classList.add("d-none");

    modalItems.modalDiscount.innerHTML = "";
    leaseInfo(modalItems.leaseinfo, modalItems.leaseinfos);

    // Changing shopping cart to download icon
    cartItems.cartIcons2[0].children[0].classList.replace("pe-7s-cart", "pe-7s-download")
    // Setting Location of beat file
    cartItems.cartIcons2[0].setAttribute("href", `./admin/Files/${type}/${beatFile}`, `${beatName}`)
    // Making File Downloadable
    cartItems.cartIcons2[0].setAttribute("download", `${beatName}`)

}

// Function for only premium items
function Premium(beatdiscount, basicamount, exclusiveamount, premiumamount, modalPrice, modalDiscount, type, cartid) {

    // Changing Download to shopping cart icon
    cartItems.cartIcons2[0].children[0].classList.replace("pe-7s-download", "pe-7s-cart");
    cartItems.cartIcons2[1].classList.remove("d-none");
    // Reseting Shopping Cart Element
    cartItems.cartIcons2[0].removeAttribute("href");
    cartItems.cartIcons2[0].removeAttribute("download");

    changedModalLease(cartid, beatdiscount, type, [basicamount, exclusiveamount, premiumamount]);



    if (type != "sample") {

        // Showing Leasetype select
        modalItems.modalSelect.style.display = "flex"
        modalItems.modalLeaseType.onchange = () => {


            changingUlInfo(modalItems.modalLeaseType, basicamount, exclusiveamount, premiumamount, [beatdiscount, modalPrice, modalDiscount], type, cartid)
            // Updating items on checkout page
            checkoutPage(true, cartid, modalItems.modalPrice.innerHTML.replace("$", ""), cartItems.cartAmount.innerHTML.replace("$", ""));

        }

    }

}

function changedModalLease(id, beatdiscount, type, [basicamount, exclusiveamount, premiumamount]) {
    const CartItems = [...cartItems.cartList.children]
    const Item = CartItems.find(item => item.id.replace("li_", "") == id && item.classList.contains("new"));
    const amount = returnItemAmount(type, modalItems.modalLeaseType, [basicamount, exclusiveamount, premiumamount])


    if (Item == undefined) {
        const leaseType = modalItems.modalSaved.leaseType[modalItems.modalSaved.id.indexOf(id)];
        const index = modalItems.modalSaved.id.indexOf(id);

        updateClassActive(false, leaseType, index, beatdiscount, amount, [basicamount, exclusiveamount, premiumamount, type])
    } else {
        const leaseType = Item.querySelector(".product-item_lease").innerHTML;

        const index = modalItems.modalSaved.id.indexOf(id);
        updateClassActive(true, leaseType, index, beatdiscount, amount, [basicamount, exclusiveamount, premiumamount, type])


    }




}




// Also responsible for cart li changing
function changingUlInfo(select, basicamount, exclusiveamount, premiumamount, [beatdiscount, modalPrice, modalDiscount], type, cartid) {
    let beatAmount = returnItemAmount(type, select, [basicamount, exclusiveamount, premiumamount]);


    checkDiscount(beatdiscount, beatAmount, modalPrice, modalDiscount)

    const item = document.querySelector(`#li_${cartid}`);
    const id = modalItems.modalSaved.id.find(item => item == cartid);
    if (item != undefined) {

        changeCartAmount(cartid, select, modalPrice.innerHTML)
        changingCartItemsInDB([userId, cartid, modalPrice.innerHTML.replace("$", ""), select.value])
    }

    // Pushing to array only when id havent been added to array
    if (id == undefined) {
        modalItems.modalSaved.id.push(cartid)
        modalItems.modalSaved.leaseType.push(select.value)
        modalItems.modalSaved.Price.discount.push(modalDiscount.innerHTML)
        modalItems.modalSaved.Price.mainPrice.push(modalPrice.innerHTML)

    } else {
        // Updating array 
        modalItems.modalSaved.leaseType[modalItems.modalSaved.id.indexOf(cartid)] = select.value
        modalItems.modalSaved.Price.discount[modalItems.modalSaved.id.indexOf(cartid)] = modalDiscount.innerHTML
        modalItems.modalSaved.Price.mainPrice[modalItems.modalSaved.id.indexOf(cartid)] = modalPrice.innerHTML


    }




}

// Function for lease info
function leaseInfo(ulleaseinfo, leaseinfos) {

    if (ulleaseinfo.children.length == 0) {
        leaseinfos.forEach((leaseinfo, index) => {
            // Creating li elements for specific number of elements in leaseinfos[]
            if (ulleaseinfo.children.length < leaseinfos.length) {
                let li = document.createElement("li")
                li.classList.add("list-group-item")
                li.innerHTML = leaseinfo

                ulleaseinfo.append(li)
            }

        })
    } else {

        leaseinfos.forEach((leaseinfo, index) => {
            ulleaseinfo.children[index].innerHTML = leaseinfo

        })
    }
}
// FUnction that calculates discount of item
function checkDiscount(beatdiscount, beatamount, modalPrice, modalDiscount) {

    // Checking if beat has a discount
    if (beatdiscount != "") {
        let discount = parseFloat(parseFloat(beatamount) * (parseInt(beatdiscount) / 100)).toFixed(2);
        let newAmount = parseFloat(parseFloat(beatamount) - parseFloat(discount)).toFixed(2)

        modalPrice.innerHTML = "$" + newAmount;
        modalDiscount.innerHTML = "$" + beatamount;


    } else {
        modalPrice.innerHTML = "$" + beatamount
        modalDiscount.innerHTML = "";

    }
}
// Function that adds item to cart
function addToCart(cartIcon, name, beatprice, leasetype, image, type, id) {
    if (!cartItems.cartIcons2[0].children[0].classList.contains("pe-7s-download")) {
        if (!cartIcon.classList.contains("cart-list-active")) {
            // Adding green color to shopping icon of item that was added to cart
            document.querySelectorAll(`.product-item[data-id='${id}'] .add-to-cart`).forEach(anchor => {
                anchor.children[0].classList.add("cart-list-active");

            })
            cartItems.cartIcons2[0].children[0].classList.add("cart-list-active")
            const cartLi = document.createElement("li");
            cartLi.classList.add("minicart-product");
            cartLi.setAttribute("id", `li_${id}`);
            cartLi.setAttribute("data-type", type);
            cartLi.classList.add("new");

            cartLi.innerHTML = ` <a class="product-item_remove" ><i class="pe-7s-close" data-tippy="Remove"
             data-tippy-inertia="true"  data-tippy-delay="50"
             data-tippy-arrow="true" data-tippy-theme="sharpborder"></i></a>
             <div data-bs-target=#quickModal data-bs-toggle=modal style='width:100%;' class=d-flex>
                 <a  class="product-item_img" style='height:60px;'>
                 <img class="img-full" src="admin/Files/${type}/${image}" alt="Product Image" style='height:100%;'>
                 </a>
 
                 <div class="product-item_content">
                     <a class="product-item_title" >${name}</a>
                     <span class="product-item_quantity" id='product_item'>$<span>${beatprice}</span></span>
                     <span class="product-item_lease" style='font-size:14px;'>${leasetype}</span>
                 </div>
             </div> 
            `

            cartItems.cartList.append(cartLi)
            cartQuantity(true, id, true)


            clickingCartItem()




            // Function that adds to db
            addCartToDB([name, beatPrice, leaseType, type, image, id]);
        } else {

            if (!cartIcon.classList.contains("pe-7s-shopbag")) {
                //  Removing item from db and 
                const removedLi = document.querySelector(`#li_${id}`)
                cartItems.cartIcons2[0].children[0].classList.remove("cart-list-active")
                removeFromCart(id, cartIcon, removedLi);
            }



        }



    }




}
// Function that removes items from cart
function removeFromCart(id, cartIcon, removedLi) {

    cartQuantity(false, id);
    // Removing green color to shopping icon of item that was added to cart
    document.querySelectorAll(`.product-item[data-id='${id}'] .add-to-cart`).forEach(anchor => {
        anchor.children[0].classList.remove("cart-list-active");

    })

    cartItems.cartList.removeChild(removedLi)
    removeCartFromDB(id, userId);
    checkoutPage(false, id, "", cartItems.cartAmount.innerHTML.replace("$", ""))

}
// Function for removing cart items by clicking  x icon
function iconThatRemovesFromCart(id) {

    let removeIcon = document.querySelector(`#li_${id} .product-item_remove i`);
    const removedLi = document.querySelector(`#li_${id}`);
    let cartIcon = document.querySelector(`.product-item[data-id='${id}'] .add-to-cart `).children[0];

    removeIcon.onclick = () => {


        removeFromCart(id, cartIcon, removedLi);

    }
}
// Function that increases or decreases item quantity in cart
function cartQuantity(add, id, cartquantity) {

    const cartLiAmounts = document.querySelectorAll(".product-item_quantity span")
    let amount = 0;



    if (add == true) {

        //    Making sure items are only increased if add icon was clicked
        if (cartquantity == true) {
            cartItems.cartQuantities.forEach(cartquantity => {
                cartquantity.innerHTML = parseInt(cartquantity.innerHTML) + 1
            })
        }

        // Incrementing quantites 
        cartLiAmounts.forEach(cartLiAmount => {
            amount += parseFloat(cartLiAmount.innerHTML)
        })
        // Totaling sum of cart Li's
        cartItems.cartAmount.innerHTML = parseFloat(amount).toFixed(2)

    } else {
        // Decrementing quantites
        cartItems.cartQuantities.forEach(cartquantity => {
            cartquantity.innerHTML = parseInt(cartquantity.innerHTML) - 1
        })
        let removed = document.querySelector(`#li_${id} .product-item_quantity span`)


        const removedAmount = parseFloat(removed.innerHTML)

        amount = cartItems.cartAmount.innerHTML - removedAmount

        cartItems.cartAmount.innerHTML = parseFloat(amount).toFixed(2)



    }
}

// FUnction that changes cart  amount
function changeCartAmount(id, select, amount) {
    let cartItemAmount = document.querySelector(`#li_${id} .product-item_quantity span`)
    let cartItemLease = document.querySelector(`#li_${id} .product-item_lease `)


    cartItemAmount.innerHTML = amount.replace("$", "")
    cartItemLease.innerHTML = select.value
    cartQuantity(true, id, false)

}

// Adding to db
async function addCartToDB([name, beatPrice, leaseType, type, image, id]) {
    let items = JSON.stringify({
        itemId: id,
        itemName: name,
        itemPrice: beatPrice,
        itemLeaseType: leaseType,
        itemImage: image,
        itemType: type,
        user: userId

    })

    let request = await fetch(`./handler.php?addtocart=${items}`)
}
// Removing from db
async function removeCartFromDB(id, userId) {

    let ids = JSON.stringify({
        cartid: id,
        userid: userId
    })
    let request = await fetch(`./handler.php?removefromcart=${ids}`);


}
// Saving User details
// async function saveUserIdToDB(userid) {
//     let request = await fetch(`./handler.php?adduser=${userid}`);

// }
// Updating DB
async function changingCartItemsInDB([userid, cartid, item_amount, item_lease_type]) {
    let items = JSON.stringify({
        userid,
        cartid,
        item_amount,
        item_lease_type
    })
    let request = await fetch(`./handler.php?changecart=${items}`);
}

function clickingCartItem() {
    if (cartItems.cartList.children.length > 0) {
        const CartItems = [...cartItems.cartList.querySelectorAll(".minicart-product.new")]

        CartItems.forEach(CartItem => {

            CartItem.onclick = function () {

                id = CartItem.getAttribute("id").replace("li_", "");

                let beatCategory = document.querySelector(`.product-item[data-id='${id}']`);



                allItems(beatCategory, id)

            }
            iconThatRemovesFromCart(CartItem.id.replace("li_", ""))

        })

    }
}
// Function  that updates class active of lease type
function updateClassActive(alreadyAdded, leasetype, index, beatdiscount, amount, [basicamount, exclusiveamount, premiumamount, type]) {


    if (alreadyAdded == false) {

        if (leasetype == undefined) {
            modalItems.modalCurrent.innerHTML = "Basic Lease"
            modalItems.modalLeaseType.value = modalItems.modalCurrent.innerHTML
            amount = basicamount
        } else {
            modalItems.modalCurrent.innerHTML = leasetype
            modalItems.modalPrice.innerHTML = modalItems.modalSaved.Price.mainPrice[index]
            modalItems.modalDiscount.innerHTML = modalItems.modalSaved.Price.discount[index]
            amount = amount
        }


        returnItemAmount(type, modalItems.modalLeaseType, [basicamount, exclusiveamount, premiumamount]);
    } else {
        modalItems.modalCurrent.innerHTML = leasetype
        modalItems.modalLeaseType.value = modalItems.modalCurrent.innerHTML
        amount = returnItemAmount(type, modalItems.modalLeaseType, [basicamount, exclusiveamount, premiumamount]);
    }


    checkDiscount(beatdiscount, amount, modalItems.modalPrice, modalItems.modalDiscount)

    let children = modalItems.modalCurrent.nextElementSibling.children;
    for (let child of children) {

        if (child.innerHTML == modalItems.modalCurrent.innerHTML) {

            child.classList.add("selected");

        } else {
            if (child.classList.contains("selected")) {
                child.classList.remove("selected")
            }
        }
    }
}
function notUpdatingClassActive() {
    // modalItems.modalCurrent.innerHTML = modalItems.modalLeaseType.children[0].innerHTML
    for (let i = 0; i < modalItems.modalCurrent.nextElementSibling.children.length; i++) {
        // Checking if element is not basic lease i.e li[0]
        if (i != 0 && modalItems.modalCurrent.nextElementSibling.children[i].classList.contains("selected")) {
            modalItems.modalCurrent.nextElementSibling.children[i].classList.remove("selected")
        }
    }

    modalItems.modalCurrent.innerHTML = modalItems.modalLeaseType.children[0].innerHTML
    modalItems.modalCurrent.nextElementSibling.children[0].classList.add("selected")
}

function returnItemAmount(type, select, [basicamount, exclusiveamount, premiumamount]) {
    let beatAmount;
    if (type != "sample") {

        if (select.value == "Basic Lease") {
            beatAmount = basicamount;
        } else if (select.value == "Exclusive Lease") {
            beatAmount = exclusiveamount;
        } else {
            beatAmount = premiumamount;
        }

        if (type == "beat") {

            if (select.value == "Basic Lease") {
                modalItems.leaseinfos = modalLeaseInfos.beat.basic


            } else if (select.value == "Exclusive Lease") {
                modalItems.leaseinfos = modalLeaseInfos.beat.exclusive


            } else if (select.value == "Premium Exclusive Lease") {
                modalItems.leaseinfos = modalLeaseInfos.beat.premium


            }

        } else if (type == "song") {
            if (select.value == "Basic Lease") {
                modalItems.leaseinfos = modalLeaseInfos.song.basic


            } else if (select.value == "Exclusive Lease") {
                modalItems.leaseinfos = modalLeaseInfos.song.exclusive


            } else if ("Premium Lease") {
                modalItems.leaseinfos = modalLeaseInfos.song.premium

            }

        } else if (type == "lyrics") {

            if (select.value == "Basic Lease") {
                modalItems.leaseinfos = modalLeaseInfos.lyrics.basic



            } else if (select.value == "Exclusive Lease") {
                modalItems.leaseinfos = modalLeaseInfos.lyrics.exclusive


            } else if ("Premium Lease") {
                modalItems.leaseinfos = modalLeaseInfos.lyrics.premium

            }
        }
    } else {
        modalItems.leaseinfos = modalLeaseInfos.sample
        beatAmount = basicamount;
    }


    leaseInfo(modalItems.leaseinfo, modalItems.leaseinfos);
    return beatAmount;


}
document.onload = clickingCartItem()

// Check out page


function checkoutPage(adding, id, newamount, totalamount) {
    if (document.querySelector(`.cart_item[data-id='${id}'] .amount`) != null) {
        let checkoutItem = document.querySelector(`.cart_item[data-id='${id}'] .amount`);
        let checkoutSubtotal = document.querySelector(".checkout-total .cart-subtotal .amount");
        let checkoutTotal = document.querySelector(".checkout-total .order-total .amount");
        let input = document.querySelector(".amount-input")


        if (adding == true) {
            // Updating check out when user tries updating cart
            checkoutItem.innerHTML = newamount

        } else {
            // Removing check out item when user removes from cart 
            let checkoutBody = document.querySelector(".checkout-body");
            checkoutBody.removeChild(checkoutItem.parentElement.parentElement);
        }
        checkoutSubtotal.innerHTML = totalamount
        checkoutTotal.innerHTML = totalamount
        input.value = checkoutTotal.innerHTML
        // Updating price for coupon code
        updateDiscount();
        amountGreaterThanZero(); // Making sure users only purchase items when item is greater than 0

    }

}
// Checking if coupon code is present in page we are doing this to prevent errors on non couponcode page
if (document.querySelector("#coupon_code") != null) {
    // When User Applies coupon code
    let code = document.querySelector("#coupon_code");
    let couponCodeBtn = document.querySelector(".coupon-inner_btn");
    let input = document.querySelector(".amount-input")

    input.value = cartItems.cartAmount.innerHTML.replace("$", "")
    amountGreaterThanZero(); // Making sure users only purchase items when item is greater than 0

    // Fires off when user first uses coupon
    couponCodeBtn.onclick = async function () {
        if (code.value != "") {
            // Giving discount if user enters coupon code
            couponCode(code)
        }
    }
    // Updating price if user tries changing price
    function updateDiscount() {
        couponCode(code)
    }
}
async function couponCode(code) {
    let req = await fetch(`./handler.php?coupon_code=${code.value}`);
    let res = await req.text();
    let expired = document.querySelector(".expired");

    if (res != "not found" && res != "Expired") {

        update(res)

    } else {
        code.classList.add("border-danger");
        if (res == "not found") {

            expired.classList.add("text-danger")
            expired.innerHTML = "Sorry, This Coupon Code is Invalid";
            code.onkeyup = async function () {
                req = await fetch(`./handler.php?coupon_code=${code.value}`);
                res = await req.text();

                if (res != "not found") {
                    update(res)
                }
            }


        } else {

            expired.classList.add("text-danger")
            expired.innerHTML = "Sorry, This Coupon Code has Expired";
        }

    }
    function update(response) {
        let checkoutSubtotal = document.querySelector(".checkout-total .cart-subtotal .amount");
        let checkoutTotal = document.querySelector(".checkout-total .order-total .amount");
        let input = document.querySelector(".amount-input")

        let discount = (parseFloat(response) / 100) * parseFloat(cartItems.cartAmount.innerHTML)
        let newPrice = parseFloat(parseFloat(cartItems.cartAmount.innerHTML) - discount).toFixed(2)

        checkoutSubtotal.innerHTML = newPrice
        checkoutTotal.innerHTML = newPrice
        input.value = newPrice

        if (code.classList.contains("border-danger")) {
            code.classList.remove("border-danger")
            code.style.border = "1px solid #dee2e6"
            expired.classList.remove("text-danger")
            expired.innerHTML = "";

        }
        code.setAttribute("disabled", "")
    }
}

// Making sure users only purchase items when item is greater than 0
function amountGreaterThanZero() {
    let checkoutSubtotal = document.querySelector(".checkout-total .cart-subtotal .amount");
    if (Number(checkoutSubtotal.innerHTML) <= 0) {
        document.querySelector("#place_order").setAttribute("disabled", "");
        document.querySelector("#order-text").innerHTML = "Amount is not greater than 0.00, Please Buy an Item";
    } else {
        document.querySelector("#place-order").removeAttribute("disabled");
        document.querySelector("#order-text").innerHTML = "";
    }
}
// FUnction that searches
// async function search(keyword){
//     let request = await fetch(`./handler.php?search${keyword}`);
//     let response = await
// }