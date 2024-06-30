// function updateCartQuantity(quantity) {
//   const cartQuantityElements = document.querySelectorAll('.cart-quantity');
//   cartQuantityElements.forEach(element => {
//     element.textContent = quantity;
//   });
// }

// function loadComponent(selector, url, callback) {
//   fetch(url)
//     .then(response => {
//       if (!response.ok) {
//         throw new Error(`HTTP error! status: ${response.status}`);
//       }
//       return response.text();
//     })
//     .then(data => {
//       document.querySelector(selector).innerHTML = data;
//       if (callback) callback();
//     })
//     .catch(error => console.error(`Error loading ${url}:`, error));
// }

// document.addEventListener('DOMContentLoaded', () => {
//   loadComponent('#navbar-placeholder', './Components/navbar.html', function () {
//     updateCartQuantity(0);
//   });

//   loadComponent('#header', './Components/Header.html');
//   loadComponent('#footer', './Components/Footer.html');
//   loadComponent('#allProducts', './Components/AllProducts.html', function () {
//     const addToCartButtons = document.querySelectorAll('#addToCart');
//     let addedToCart = 0;

//     addToCartButtons.forEach(button => {
//       button.addEventListener('click', function () {
//         addedToCart += 1;
//         console.log('Items added to cart:', addedToCart);
//         updateCartQuantity(addedToCart);
//       });
//     });
//   });
// });

// document.addEventListener('DOMContentLoaded', () => {
//   const minusButton = document.getElementById('minus');
//   const plusButton = document.getElementById('plus');
//   const currentQuantityElement = document.getElementById('currentQuantity');
//   let currentQuantity = parseInt(currentQuantityElement.textContent, 10);

//   function updateCartQuantityDisplay() {
//     currentQuantityElement.textContent = currentQuantity;
//   }
//   minusButton.addEventListener('click', () => {
//     if (currentQuantity > 1) {
//       currentQuantity -= 1;
//       updateCartQuantityDisplay();
//     }
//   });

//   plusButton.addEventListener('click', () => {
//     currentQuantity += 1;
//     updateCartQuantityDisplay();
//   });

//   updateCartQuantityDisplay();
// });

// document.addEventListener('DOMContentLoaded', () => {
//   const minusButtons = document.querySelectorAll('.minus');
//   const plusButtons = document.querySelectorAll('.plus');
//   const currentQuantityElements = document.querySelectorAll('.currentQuantity');

//   minusButtons.forEach((minusButton, index) => {
//     minusButton.addEventListener('click', () => {
//       let currentQuantity = parseInt(
//         currentQuantityElements[index].textContent,
//         10,
//       );
//       if (currentQuantity > 1) {
//         currentQuantity -= 1;
//         currentQuantityElements[index].textContent = currentQuantity;
//       }
//     });
//   });

//   plusButtons.forEach((plusButton, index) => {
//     plusButton.addEventListener('click', () => {
//       let currentQuantity = parseInt(
//         currentQuantityElements[index].textContent,
//         10,
//       );
//       currentQuantity += 1;
//       currentQuantityElements[index].textContent = currentQuantity;
//     });
//   });
// });

// document.addEventListener('DOMContentLoaded', function () {
//   const products = document.querySelectorAll('.product');
//   const subtotalElement = document.getElementById('subtotal');
//   const estimatedShippingElement = document.getElementById('estimatedShipping');
//   const totalElement = document.getElementById('total');

//   const updateTotals = () => {
//     let subtotal = 0;
//     products.forEach(product => {
//       const quantity = parseInt(
//         product.querySelector('.currentQuantity').textContent,
//         10,
//       );
//       const price = parseFloat(product.getAttribute('data-price'));
//       const productSubtotal = quantity * price;
//       product.querySelector(
//         '.productSubtotal',
//       ).textContent = `৳${productSubtotal}`;
//       subtotal += productSubtotal;
//     });

//     const estimatedShipping = parseFloat(
//       estimatedShippingElement.textContent.replace('৳', ''),
//     );
//     const total = subtotal + estimatedShipping;

//     subtotalElement.textContent = `৳${subtotal}`;
//     totalElement.textContent = `৳${total}`;
//   };

//   const attachEventListeners = () => {
//     products.forEach(product => {
//       const minusButton = product.querySelector('.minus');
//       const plusButton = product.querySelector('.plus');
//       const quantityElement = product.querySelector('.currentQuantity');

//       minusButton.addEventListener('click', function () {
//         console.log('Minus button clicked');
//         let quantity = parseInt(quantityElement.textContent, 10);
//         if (quantity > 1) {
//           quantity -= 0;
//           quantityElement.textContent = quantity;
//           updateTotals();
//         }
//       });

//       plusButton.addEventListener('click', function () {
//         console.log('Plus button clicked');
//         let quantity = parseInt(quantityElement.textContent, 10);
//         quantity += 0;
//         quantityElement.textContent = quantity;
//         updateTotals();
//       });
//     });
//   };

//   attachEventListeners();
//   updateTotals(); // Initial calculation
// });

// scroll down 
document.addEventListener('DOMContentLoaded', function() {
    var scrollDownButton = document.getElementById('scrolldown');
  
    
    window.addEventListener('scroll', function() {
      if (window.scrollY > 100) {
        scrollDownButton.style.bottom = '40px'; 
        scrollDownButton.style.right = '10px'; 
      } else {
        scrollDownButton.style.bottom = '-50px';
      }
    });
  
  
    scrollDownButton.addEventListener('click', function() {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  });
