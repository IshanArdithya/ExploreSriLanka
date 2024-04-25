<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    <title>Destinations | Explore Srilanka</title> 
</head>

<body>

    <!-- Header -->
    <?php
    include 'components/header.php';
    ?>

    <div class="top-image">
        <img src="./Images/slides/slide-18.jpg" alt="">
        <h1 class="headings sub-heading"></h1>
    </div>

    <!-- Breadcrumbs -->
    <div class="container">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php" title="Explore Sri Lanka" class="bolds">Home</a></li>
                <li class="active">Destinations</li>
            </ol>
        </div>

        <div class="container">
            <h1 class="headings mini-heading">Destinations</h1>
            <p class="lead mini-lead"> Explore the diverse and enchanting destinations of Sri Lanka, where history, culture, and natural beauty intertwine seamlessly. Delve into the rich tapestry of the island's past through ancient ruins and sacred sites, each echoing tales of civilizations long gone. Experience the vibrant pulse of local life as you wander through bustling markets and immerse yourself in age-old traditions. Then, escape to the tranquil shores of pristine beaches, where golden sands meet azure waters, offering moments of serenity and relaxation. Whether you seek adventure, tranquility, or cultural immersion, Sri Lanka promises an unforgettable journey filled with discovery and wonder.
            </p>
        </div>

        <!-- search  -->
        <div class="container">
            <div class="category-contain destination-search">
                <form method="post" id="package_filter_form" class="form">

                    <div class="form-group">
                        <label for="district">Select District</label>
                        <select aria-label="District" class="form-control" name="district" id="district">
                            <option value="">All</option>
                            <option value="Anuradhapura">Anuradhapura</option>
                            <option value="Badulla">Badulla</option>
                            <option value="Colombo">Colombo</option>
                            <option value="Galle">Galle</option>
                            <option value="Hambantota">Hambantota</option>
                            <option value="Ampara">Ampara</option>
                            <option value="Kalutara">Kalutara</option>
                            <option value="Kandy">Kandy</option>
                            <option value="Kegalle">Kegalle</option>
                            <option value="Matara">Matara</option>
                            <option value="Matale">Matale</option>
                            <option value="Nuwara Eliya">Nuwara Eliya</option>
                            <option value="Polonnaruwa">Polonnaruwa</option>
                            <option value="Puttalam">Puttalam</option>
                            <option value="Rathnapura">Rathnapura</option>
                            <option value="Trincomalee">Trincomalee</option>
                            <option value="Gampaha">Gampaha</option>
                        </select>
                    </div>
                </form>
            </div>
        </div>

        <div class="container">
            <div class="tour-items-wrapper row-wise-img">
                <a class="item-box" href="destinations/Anuradhapura.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/anuradhapuramain.avif" alt="">
                    </div>
                    <div class="text-item-box ">
                        <div class="heading-legend">Anuradhapura</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>

                    <a class="item-box" href="destinations/Ella.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/ellamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Ella</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>



                    <a class="item-box" href="destinations/Mirissa.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/mirissamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Mirissa</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Kandy.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/kandymain.jpeg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Kandy</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>


                    <a class="item-box" href="destinations/Kalutara.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/kalutaramain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Kalutara</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Nuwara-Eliya.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/nuwaraeliyamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Nuwara Eliya</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Pasikudahnew.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/pasikudahmain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Pasikudah</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Polonnaruwa.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/polonnaruwamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Polonnaruwa</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Sigiriya.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/sigiriyamain.jpeg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Sigiriya</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Tangalle.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/tangallemain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Tangalle</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Trincomalee.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/trincomaleemain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Trincomalee</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>


                    <a class="item-box" href="destinations/Colombo.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/colombomainnew.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Colombo</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Galle.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/gallemainnew.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Galle</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>


                    <a class="item-box" href="destinations/Unawatuna.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/unawatunamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Unawatuna</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Weligama.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/weligamamain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Weligama</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Sinharaja.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/sinharajamain.jpeg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Sinharaja</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Hikkaduwa.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/hikkaduwamainew.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Hikkaduwa</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Beruwala.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/beruwalamain.jpeg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Beruwala</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>




                    <a class="item-box" href="destinations/Matara.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/mataramain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Matara</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Mihintale.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/mihintalemain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Mihintale</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>



                    <a class="item-box" href="destinations/Dabulla.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/dabullamain.jpg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Dabulla</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>

                    <a class="item-box" href="destinations/Negombo.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/negombomain.avif" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Negombo</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>


                    <a class="item-box" href="destinations/Kitulgala.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/kitulgalamain.jpeg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Kitulgala</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>


                    <a class="item-box" href="destinations/Kalpitiya.php">
                        <div class="img-wrapper">
                            <img src="./destinations/Images/kalpitiyamain.jpg" alt="">
                        </div>
                        <div class="text-item-box tour-item-box">
                            <div class="heading-legend">Kalpitiya</div>
                            <div class="text-small-legend"></div>
                            <div class="btn-wrapper-common">
                                <span>Find Out More</span>
                            </div>
                        </div>
                    </a>



                </a>
                <a class="item-box" href="destinations/Arugam-Bay.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/arugambaymain.avif" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Arugam-Bay</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>


                <a class="item-box" href="destinations/Induruwa.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/induruwamain.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Induruwa</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="destinations/Bandarawela.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/bandarawelamainn.jpg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Bandarawela</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="destinations/Bentota.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/bentotamain.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Bentota</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>



                <a class="item-box" href="destinations/Batticaloa.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/batticaloamain.jpg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Batticaloa</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="destinations/Habarana.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/habaranamain.jpg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Habarana</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="destinations/Haputale.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/haputalemain11.jpeg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Haputale</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>

                <a class="item-box" href="destinations/Horton-Plains.php">
                    <div class="img-wrapper">
                        <img src="./destinations/Images/hortonplainsmain.jpg" alt="">
                    </div>
                    <div class="text-item-box tour-item-box">
                        <div class="heading-legend">Horton Plains</div>
                        <div class="text-small-legend"></div>
                        <div class="btn-wrapper-common">
                            <span>Find Out More</span>
                        </div>
                    </div>
                </a>


            </div>
        </div>
    </div>


    <!-- Footer -->
    <?php
    include 'components/footer.php';
    ?>

    <button id="toTop" class="fa fa-arrow-up"></button>

    <script src="js/script.js"></script>
    <script>
    document.getElementById('district').addEventListener('change', function() {
        var selectedDistrict = this.value;
        var items = document.querySelectorAll('.item-box');

        items.forEach(function(item) {
            var destination = item.getAttribute('href').split('/')[1].split('.')[0]; 
            var district = getDistrict(destination); 

            if (selectedDistrict === '' || district === selectedDistrict) {
                item.style.display = 'block'; 
            } else {
                item.style.display = 'none'; 
            }
        });
    });

    // Function to map destinations to their districts
    function getDistrict(destination) {
        switch (destination) {
            case 'Pasikudah':
            case 'Batticaloa':
                return 'Batticaloa';
            case 'Anuradhapura':
                return 'Anuradhapura';
            case 'Polonnaruwa':
                return 'Polonnaruwa';
            case 'Sinharaja':
                return 'Rathnapura';
            case 'Nuwara-Eliya':
                return 'Nuwara Eliya';
            case 'Sigiriya':
                return 'Matale';
            case 'Ella':
                return 'Badulla';
            case 'Galle':
            case 'Bentota':
            case 'Unawatuna':
            case 'Induruwa':
                return 'Galle';
            case 'Tangalle':
                return 'Hambantota';
            case 'Arugam-Bay':
                return 'Ampara';
            case 'Bandarawela':
                return 'Badulla';
            case 'Trincomalee':
                return 'Trincomalee';
            case 'Kalpitiya':
                return 'Puttalam';
            case 'Kalutara':
                return 'Kalutara';
            case 'Kandy':
                return 'Kandy';
            case 'Kitulgala':
                return 'Kegalle';
            case 'Matara':
            case 'Mirissa':
            case 'Weligama':
                return 'Matara';
            case 'Dambulla':
            case 'Mihintale':
                return 'Matale';
            case 'Habarana':
                return 'Anuradhapura';
            case 'Haputale':
                return 'Badulla';
            case 'Hikkaduwa':
                return 'Galle';
            case 'Horton-Plains':
                return 'Nuwara Eliya';
            case 'Beruwala':
                return 'Kalutara';
            case 'Negombo':
                return 'Gampaha';
            default:
                return '';
        }
    }
</script>

</body>

</html>