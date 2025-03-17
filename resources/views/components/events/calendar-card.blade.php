<style>
    .calendar {
        display: flex;
        padding: 0px 10px;
        align-items: center;
        justify-content: center;
    }

    .calendar-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.12);
    }

    .calendar-container header {
        display: flex;
        align-items: center;
        padding: 5px 20px 5px;
        justify-content: space-between;
    }

    header .calendar-navigation {
        display: flex;
    }

    header .calendar-navigation span {
        height: 30px;
        width: 38px;
        margin: 0 1px;
        cursor: pointer;
        text-align: center;
        line-height: 38px;
        border-radius: 50%;
        user-select: none;
        color: #aeabab;
        font-size: 1.9rem;
    }

    .calendar-navigation span:last-child {
        margin-right: -10px;
    }

    header .calendar-navigation span:hover {
        background: #f2f2f2;
    }

    header .calendar-current-date {
        font-weight: 500;
        font-size: 1.45rem;
    }

    .calendar-body {
        padding: 3px;
    }

    .calendar-body ul {
        list-style: none;
        flex-wrap: wrap;
        display: flex;
        text-align: center;
    }

    .calendar-body .calendar-dates {
        margin-bottom: 5px;
    }

    .calendar-body li {
        width: calc(100% / 7);
        font-size: 1rem;
        color: #414141;
    }

    .calendar-body .calendar-weekdays li {
        cursor: default;
        font-weight: 500;
    }

    .calendar-body .calendar-dates li {
        margin-top: 15px;
        position: relative;
        z-index: 1;
        cursor: pointer;
    }

    .calendar-dates li.inactive {
        color: #aaa;
    }

    .calendar-dates li.active {
        color: #fff;
    }

    .calendar-dates li::before {
        position: absolute;
        content: "";
        z-index: -1;
        top: 50%;
        left: 50%;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        transform: translate(-50%, -50%);
    }

    .calendar-dates li.active::before {
        background: #FF2323;
    }

    .calendar-dates li:not(.active):hover::before {
        background: #e4e1e1;
    }

    .date-input {
        height: 40px;
        padding: 0 10px 0 10px;
        border-radius: 5px;
        margin-bottom: 0.75rem;
        border: 0.5px solid rgba(135, 7, 7, 0.55);
        color: #FF2323;
        font-size: 18px;
        font-weight: 400;
    }
</style>
<div class="calendar-container">
    <header class="calendar-header">
        <div class="calendar-navigation">
            <span id="calendar-prev" class="material-symbols-rounded"><i class="fa fa-chevron-left"></i></span>
        </div>
        <p class="primary-text mb-0 mt-2 calendar-current-date"></p>
        <div class="calendar-navigation">
            <span id="calendar-next" class="material-symbols-rounded text-dark"><i class="fa fa-chevron-right"></i></span>
        </div>
    </header>
    <div class="calendar-body">
        <ul class="ps-0 calendar-weekdays">
            <li>Sun</li>
            <li>Mon</li>
            <li>Tue</li>
            <li>Wed</li>
            <li>Thu</li>
            <li>Fri</li>
            <li>Sat</li>
        </ul>
        <ul class="ps-0 calendar-dates"></ul>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.9/flatpickr.min.js"></script>
<script>
    flatpickr("#event-date", {
        dateFormat: "Y-m-d"
    });

    let date = new Date();
    let year = date.getFullYear();
    let month = date.getMonth();

    const day = document.querySelector(".calendar-dates");
    const currdate = document.querySelector(".calendar-current-date");
    const prenexIcons = document.querySelectorAll(".calendar-navigation span");

    const months = [
        "January", "February", "March", "April", "May", "June",
        "July", "August", "September", "October", "November", "December"
    ];

    const manipulate = () => {
        let dayone = new Date(year, month, 1).getDay();
        let lastdate = new Date(year, month + 1, 0).getDate();
        let dayend = new Date(year, month, lastdate).getDay();
        let monthlastdate = new Date(year, month, 0).getDate();

        let lit = "";
        for (let i = dayone; i > 0; i--) {
            lit += `<li class="inactive">${monthlastdate - i + 1}</li>`;
        }
        for (let i = 1; i <= lastdate; i++) {
            let isToday = i === date.getDate() && month === new Date().getMonth() && year === new Date()
                .getFullYear() ? "active" : "";
            lit += `<li class="${isToday}">${i}</li>`;
        }
        for (let i = dayend; i < 6; i++) {
            lit += `<li class="inactive">${i - dayend + 1}</li>`
        }

        currdate.innerText = `${months[month]} ${year}`;
        day.innerHTML = lit;

        // Add event listener for date click
        document.querySelectorAll('.calendar-dates li').forEach(dateElem => {
            dateElem.addEventListener('click', function() {
                if (!this.classList.contains('inactive')) {
                    let selectedDate = `${year}-${month + 1}-${this.textContent}`;
                    console.log("Selected date:", selectedDate);
                    window.open.href = `/event/f?date=${clickedDate}`;
                }
            });
        });
    }

    manipulate();
    prenexIcons.forEach(icon => {
        icon.addEventListener("click", () => {
            month = icon.id === "calendar-prev" ? month - 1 : month + 1;
            if (month < 0 || month > 11) {
                date = new Date(year, month, new Date().getDate());
                year = date.getFullYear();
                month = date.getMonth();
            } else {
                date = new Date();
            }
            manipulate();
        });
    });
</script>
