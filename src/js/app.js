document.addEventListener('DOMContentLoaded', function () {
    
    eventListener();

    darkMode();
});

function darkMode() {

    const preferDarkMode = window.matchMedia('(prefers-color-scheme: dark');

    // console.log(preferDarkMode.matches);

    if (preferDarkMode.matches) {
        document.body.classList.add('dark-mode');
    } else {
        document.body.classList.remove('dark-mode');
    }

    preferDarkMode.addEventListener('change', function () {
        if (preferDarkMode.matches) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    })

    const buttomDarkMode = document.querySelector('.dark-mode-button');

    buttomDarkMode.addEventListener('click', function () {
        document.body.classList.toggle('dark-mode');
    })
}


function eventListener() {
    const mobileMenun = document.querySelector('.mobile-menu');

    mobileMenun.addEventListener('click', responsiveNavigation);

    //Show conditional fields
    const contactMethod = document.querySelectorAll('input[name="contact[contact]"]');
    contactMethod.forEach(input => input.addEventListener('click', showContacMethod))
    

}

function responsiveNavigation() {
    const navigation = document.querySelector('.navigation');
    
    if (navigation.classList.contains('see')) {
        navigation.classList.remove('see');
    } else {
        navigation.classList.add('see');
    }
}

function showContacMethod(e) {
    const contactDiv = document.querySelector('#contact');
    
    if(e.target.value === 'phone') {
        contactDiv.innerHTML = `
        <label for="phone"Number Phone</label>
        <input type="tel" placeholder="Your Number Phone" id="phone" name="contact[phone]">
        

        <p>Choose the date and time for the call</p>

        <label for="date">Date:</label>
        <input type="date" id="date"  name="contact[date]">

        <label for="time">Time:</label>
        <input type="time" id="time" min="09:00" max="18:00"  name="contact[time]">
        ` ;
    } else {
        contactDiv.innerHTML = `
        <label for="email">E-mail</label>
        <input type="email" placeholder="Your Mail" id="email" name="contact[email]" required>
        `;
    }
}