<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.css" rel="stylesheet">
    <link href="https://bgsrb.github.io/flatpickr-jalali/dist/themes/rtl.css" rel="stylesheet">
    <script src="https://bgsrb.github.io/flatpickr-jalali/examples/jalali/jdate.min.js"></script>
    <script>window.Date=window.JDate;</script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/flatpickr.min.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/plugins/rangePlugin.js"></script>
    <script src="https://bgsrb.github.io/flatpickr-jalali/dist/l10n/fa.js"></script>
    <style>
        html,body{
            direction:rtl;
            text-align: right;
        }
    </style>
</head>
<body>
<div class="container">
    <br>
    <form>
        <div class="form-row">
            <div class="form-group col-auto">
                <label for="startDate">تاریخ شروع</label>
                <input class="readonly form-control flatpickr-input" id="startDate" style="direction:ltr; width:210px;" type="text">
            </div>
            <div class="form-group col-auto">
                <label for="toDate">تاریخ پایان</label>
                <input class="readonly form-control" id="toDate" style="direction:ltr; width:210px;" data-fp-omit="">
            </div>
        </div>
    </form>
</div>

<script>
    flatpickr("#startDate", {
        enableTime: true,
        "locale": "fa" ,
        "plugins": [new rangePlugin({ input: "#toDate"})]
    });
</script><div class="flatpickr-calendar hasTime rangeMode arrowTop showTimeInput" tabindex="-1" style="top: 96px; left: 1113px; right: auto;"><div class="flatpickr-month"><span class="flatpickr-prev-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M5.207 8.471l7.146 7.147-0.707 0.707-7.853-7.854 7.854-7.853 0.707 0.707-7.147 7.146z"></path></svg></span><div class="flatpickr-current-month"><span class="cur-month">اسفند </span><div class="numInputWrapper"><input class="numInput cur-year" type="text" pattern="\d*" tabindex="-1"><span class="arrowUp"></span><span class="arrowDown"></span></div></div><span class="flatpickr-next-month" style="display: block;"><svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 17 17"><g></g><path d="M13.207 8.472l-7.854 7.854-0.707-0.707 7.146-7.146-7.146-7.148 0.707-0.707 7.854 7.854z"></path></svg></span></div><div class="flatpickr-innerContainer"><div class="flatpickr-rContainer"><div class="flatpickr-weekdays">
    <span class="flatpickr-weekday">
      یک</span><span class="flatpickr-weekday">دو</span><span class="flatpickr-weekday">سه</span><span class="flatpickr-weekday">چهار</span><span class="flatpickr-weekday">پنج</span><span class="flatpickr-weekday">جمعه</span><span class="flatpickr-weekday">شنبه
    </span>
            </div><div class="flatpickr-days" tabindex="-1"><div class="dayContainer"><span class="flatpickr-day prevMonthDay" aria-label="بهمن 28, 1403" tabindex="-1">28</span><span class="flatpickr-day prevMonthDay" aria-label="بهمن 29, 1403" tabindex="-1">29</span><span class="flatpickr-day prevMonthDay" aria-label="بهمن 30, 1403" tabindex="-1">30</span><span class="flatpickr-day " aria-label="اسفند 1, 1403" tabindex="-1">1</span><span class="flatpickr-day " aria-label="اسفند 2, 1403" tabindex="-1">2</span><span class="flatpickr-day " aria-label="اسفند 3, 1403" tabindex="-1">3</span><span class="flatpickr-day " aria-label="اسفند 4, 1403" tabindex="-1">4</span><span class="flatpickr-day " aria-label="اسفند 5, 1403" tabindex="-1">5</span><span class="flatpickr-day " aria-label="اسفند 6, 1403" tabindex="-1">6</span><span class="flatpickr-day " aria-label="اسفند 7, 1403" tabindex="-1">7</span><span class="flatpickr-day " aria-label="اسفند 8, 1403" tabindex="-1">8</span><span class="flatpickr-day " aria-label="اسفند 9, 1403" tabindex="-1">9</span><span class="flatpickr-day " aria-label="اسفند 10, 1403" tabindex="-1">10</span><span class="flatpickr-day " aria-label="اسفند 11, 1403" tabindex="-1">11</span><span class="flatpickr-day " aria-label="اسفند 12, 1403" tabindex="-1">12</span><span class="flatpickr-day " aria-label="اسفند 13, 1403" tabindex="-1">13</span><span class="flatpickr-day selected startRange" aria-label="اسفند 14, 1403" tabindex="-1">14</span><span class="flatpickr-day inRange" aria-label="اسفند 15, 1403" tabindex="-1">15</span><span class="flatpickr-day inRange" aria-label="اسفند 16, 1403" tabindex="-1">16</span><span class="flatpickr-day inRange" aria-label="اسفند 17, 1403" tabindex="-1">17</span><span class="flatpickr-day inRange" aria-label="اسفند 18, 1403" tabindex="-1">18</span><span class="flatpickr-day today inRange" aria-label="اسفند 19, 1403" tabindex="-1">19</span><span class="flatpickr-day inRange" aria-label="اسفند 20, 1403" tabindex="-1">20</span><span class="flatpickr-day inRange" aria-label="اسفند 21, 1403" tabindex="-1">21</span><span class="flatpickr-day inRange" aria-label="اسفند 22, 1403" tabindex="-1">22</span><span class="flatpickr-day inRange" aria-label="اسفند 23, 1403" tabindex="-1">23</span><span class="flatpickr-day inRange" aria-label="اسفند 24, 1403" tabindex="-1">24</span><span class="flatpickr-day inRange" aria-label="اسفند 25, 1403" tabindex="-1">25</span><span class="flatpickr-day inRange" aria-label="اسفند 26, 1403" tabindex="-1">26</span><span class="flatpickr-day inRange" aria-label="اسفند 27, 1403" tabindex="-1">27</span><span class="flatpickr-day inRange" aria-label="اسفند 28, 1403" tabindex="-1">28</span><span class="flatpickr-day inRange" aria-label="اسفند 29, 1403" tabindex="-1">29</span><span class="flatpickr-day nextMonthDay inRange" aria-label="فروردین 1, 1404" tabindex="-1">1</span><span class="flatpickr-day nextMonthDay inRange" aria-label="فروردین 2, 1404" tabindex="-1">2</span><span class="flatpickr-day nextMonthDay selected endRange" aria-label="فروردین 3, 1404" tabindex="-1">3</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 4, 1404" tabindex="-1">4</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 5, 1404" tabindex="-1">5</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 6, 1404" tabindex="-1">6</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 7, 1404" tabindex="-1">7</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 8, 1404" tabindex="-1">8</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 9, 1404" tabindex="-1">9</span><span class="flatpickr-day nextMonthDay" aria-label="فروردین 10, 1404" tabindex="-1">10</span></div></div></div></div><div class="flatpickr-time" tabindex="-1"><div class="numInputWrapper"><input class="numInput flatpickr-hour" type="text" pattern="\d*" tabindex="-1" data-step="1" data-min="1" data-max="12"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-time-separator">:</span><div class="numInputWrapper"><input class="numInput flatpickr-minute" type="text" pattern="\d*" tabindex="-1" data-step="5" data-min="0" data-max="59"><span class="arrowUp"></span><span class="arrowDown"></span></div><span class="flatpickr-am-pm" title="Click to toggle" tabindex="-1">بعدازظهر</span></div></div>
</body>
</html>
