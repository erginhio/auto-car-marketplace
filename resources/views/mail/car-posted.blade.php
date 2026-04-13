<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Car Posted Successfully</title>
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <style>
            * {
                box-sizing: border-box;
            }
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                background-color: #f2f2f2;
            }
            .wrapper {
                width: 100%;
                height: 100vh;
                display: flex;
                justify-content: center;
                align-items: center;
            }
            .container {
                background-color: #fff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                animation: fadeIn 0.5s ease-in-out;
                max-width: 400px;
                margin: 0 auto;
            }
            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }
                100% {
                    opacity: 1;
                }
            }
            .success {
                color: #2ecc71;
                font-size: 2em;
                text-align: center;
                margin-bottom: 10px;
            }
            .message {
                text-align: center;
                font-size: 1.2em;
                line-height: 1.5em;
            }
            .button {
                background-color: #a256f2;
                color: white;
                padding: 10px;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                margin: 10px auto;
                display: block;
                width: 100%;
            }
            .button:hover {
                background-color: #8e44ad;
            }
            .car-info {
                margin-top: 20px;
            }
            .car-info h3 {
                margin-bottom: 10px;
            }
            .car-info a {
                color: #a256f2;
            }
        </style>
    </head>
    <body>
        <div class="wrapper">
            <div class="container">
                <img
                    src="https://raw.githubusercontent.com/Seyla123/Laravel-cars-selling-website/refs/heads/develop/public/assets/images/logo.png"
                    width="100"
                    alt="Car Sell Website Logo"
                    style="display: block; margin: 0 auto 20px"
                />
                <div style="display: flex; justify-content: center; flex-direction: column">
                    <p class="message">
                        Congratulations! Your car has been posted successfully!
                    </p>
                    <i class="fas fa-check-circle success"></i>
                </div>
                <div class="car-info">
                    <h3>Car Information</h3>
                    <p>Make: {{ $car->maker->name }}</p>
                    <p>Model: {{ $car->model->name }}</p>
                    <p>Year: {{ $car->year }}</p>
                    <p>Price: ${{ number_format($car->price, 2) }}</p>
                    <p>
                        <a href="{{ url('/car/'.$car->id) }}"
                            >View Car Listing</a
                        >
                    </p>
                </div>
                <p class="message">
                    We hope your car sells quickly and easily! If you have any
                    questions or need any assistance, please don't hesitate to
                    contact us.
                </p>
                <p class="message">
                    Thank you for choosing our website to post your car!
                </p>
                <a
                    href="{{ url('/') }}"
                    class="button"
                    style="
                        background-color: #8e44ad;
                        color: white;
                        padding: 15px 20px;
                        text-align: center;
                        text-decoration: none;
                        display: inline-block;
                        font-size: 16px;
                        margin: 10px auto;
                        border-radius: 5px;
                        border: none;
                        transition: background-color 0.3s ease;
                    "
                    >Return to Home Page</a
                >
            </div>
        </div>
    </body>
</html>
