<html>

<head>
    <title>
    </title>
    <link type="text/css" href="<?=base_url()?>assets/user/css/tailwind.min.css" rel="stylesheet">
   
	<link rel="stylesheet" type="text/css" href="<?=base_url()?>assets/user/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
</head>

<body>
    <!-- menu -->
    <header class="text-gray-700 body-font">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <a href="http://www.nitrr.ac.in/" class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
                <!-- <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path> -->
        <img src="<?= base_url()?>assets/favicon/logo.png" ?>
      </svg>
                <span class="ml-3 text-xl">Smart Gate Entrance</span>
            </a>
            <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
                <a href="#status" class="mr-5 hover:text-gray-900">Status</a>
                <a href="#Functionality" class="mr-5 hover:text-gray-900">Functionalities</a>
                <a href="#RegisterdUser" class="mr-5 hover:text-gray-900">Users</a>
                <a href="#working" class="mr-5 hover:text-gray-900">How It Works</a>
                <a href="#team" class="mr-5 hover:text-gray-900">Our Team</a>
                <a href="#contact" class="mr-5 hover:text-gray-900">Contact</a>
            </nav>
            <a href=<?=base_url('Admin-Login-View')?> class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Admin</a>
            <a href=<?=base_url('User-Login-View')?> style="margin-left:3px " class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">User Login</a>
        </div>
    </header>
    <!-- menu -->
    <!-- below menu -->
    <section id="status" class="text-gray-700 body-font ">
        <div class="container px-5 py-10 mx-auto ">
            <div class="flex flex-col text-center w-full mb-10 ">
                <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900 ">Smart Gate Entrance</h1>
                <p class="lg:w-2/3 mx-auto leading-relaxed text-base ">
                    Welcome to Smart Gate This webapplication is developed to help students , staffs , various visitors to smartly enter to institution building as well as hostel mess. By the help of QR generated at time of registration of user , we are working to create
                    a gate which function as soon as user scan the QR in embedded machine to gate and open the gate to provide entry. By help of this system we can able to find various data like number of peoples in building , we can also take attendance
                    based on it.
                </p>
            </div>
            <div class="flex flex-wrap -m-4 text-center ">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg ">
                    <i class="fas fa fa-list" style="font-size:45px;margin:7px;color:#667EEA"></i>
            
                        <h2 class="title-font font-medium text-3xl text-gray-900 ">2.7K</h2>
                        <p class="leading-relaxed ">Downloads</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg ">
                        <!-- <svg fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="text-teal-500 w-12 h-12 mb-3 inline-block " viewBox="0 0 24 24 ">
              <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2 "></path>
              <circle cx="9 " cy="7 " r="4 "></circle>
              <path d="M23 21v-2a4 4 0 00-3-3.87m-4-12a4 4 0 010 7.75 "></path>
            </svg> -->
            <i class="fas fa fa-user" style="font-size:45px;margin:7px;color:#667EEA"></i>
            
                        <h2 class="title-font font-medium text-3xl text-gray-900 ">1.3K</h2>
                        <p class="leading-relaxed ">Users</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg ">
                        <!-- <svg fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="text-teal-500 w-12 h-12 mb-3 inline-block " viewBox="0 0 24 24 ">
              <path d="M3 18v-6a9 9 0 0118 0v6 "></path>
              <path d="M21 19a2 2 0 01-2 2h-1a2 2 0 01-2-2v-3a2 2 0 012-2h3zM3 19a2 2 0 002 2h1a2 2 0 002-2v-3a2 2 0 00-2-2H3z "></path>
            </svg> -->
            <i class="fas fa fa-group" style="font-size:45px;margin:7px;color:#667EEA"></i>
            
                        <h2 class="title-font font-medium text-3xl text-gray-900 ">74</h2>
                        <p class="leading-relaxed ">Files</p>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full ">
                    <div class="border-2 border-gray-200 px-4 py-6 rounded-lg ">
                        <!-- <svg fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="text-teal-500 w-12 h-12 mb-3 inline-block " viewBox="0 0 24 24 ">
              <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z "></path>
            </svg> -->
            <i class="fas fa fa-search" style="font-size:45px;margin:7px;color:#667EEA"></i>
            
                        <h2 class="title-font font-medium text-3xl text-gray-900 ">46</h2>
                        <p class="leading-relaxed ">Places</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- below menu -->
    <!-- middle -->
    <section id="Functionality" class="text-gray-700 body-font">
        <div class="container px-10 py-10 mx-auto">
            <div class="flex flex-col text-center w-full mb-10">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">What we facilitate?</h1>
            </div>
            <div class="flex flex-wrap -m-4">
                <div class="p-3 md:w-1/4">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M22 12h-4l-3 9L9 3l-3 9H2"></path>
                        </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Smart Entry</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base text-justify text-justify">Smart entry provides the major functionality to the visitors, students as well as the teachers to login into the SMART GATE portal with the enhanced QR code and mobile number and access the platform for analysis and tracking purpose.</p>
                            <!-- <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                      </a> -->
                        </div>
                    </div>
                </div>
                <div class="p-3 md:w-1/4">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                          <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Visitor Analysis</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base text-justify">The visitors logged into the system are the users to SMART GATE platform that needs to be analyzed for various reasons by the institution. The visitors’ analysis enables the institution to trace their availability and presence in the institution.</p>
                            <!-- <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More -->
                        <!-- <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg> -->
                      <!-- </a> -->
                        </div>
                    </div>
                </div>
                <div class="p-3 md:w-1/4">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <circle cx="6" cy="6" r="3"></circle>
                          <circle cx="6" cy="18" r="3"></circle>
                          <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Student Presence Tracking</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <!-- <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                      </a> -->
                        </div>
                    </div>
                </div>
                <div class="p-3 md:w-1/4">
                    <div class="flex rounded-lg h-full bg-gray-100 p-8 flex-col">
                        <div class="flex items-center mb-3">
                            <div class="w-8 h-8 mr-3 inline-flex items-center justify-center rounded-full bg-indigo-500 text-white flex-shrink-0">
                                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                          <circle cx="6" cy="6" r="3"></circle>
                          <circle cx="6" cy="18" r="3"></circle>
                          <path d="M20 4L8.12 15.88M14.47 14.48L20 20M8.12 8.12L12 12"></path>
                        </svg>
                            </div>
                            <h2 class="text-gray-900 text-lg title-font font-medium">Student Presence Tracking</h2>
                        </div>
                        <div class="flex-grow">
                            <p class="leading-relaxed text-base">Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine.</p>
                            <!-- <a class="mt-3 text-indigo-500 inline-flex items-center">Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                          <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                      </a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- middle -->


<!-- working map -->
<section class="text-gray-700 body-font">
  <div class="container px-5 py-24 mx-auto flex flex-wrap">
   <div class="flex flex-col text-center w-full mb-3  px-5 py-5">
    <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">How To Works ?</h1>
    </div>
    <div class="flex flex-wrap w-full">
      <div class="lg:w-2/5 md:w-1/2 md:pr-10 md:py-6">
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
              <i class="fa fa-pencil" style="font-size:20px"></i>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Register</h2>
            <p class="leading-relaxed" >Register here as a user fill basic details , get a login access to system to check your activity and do access lots of other functinalities</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
            <i class="fa fa-qrcode" style="font-size:20px"></i>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Get QR Code</h2>
            <p class="leading-relaxed">After registration you will get a QR Code ,keep it safe. You can also download QR later by logging in Web Based System.</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
            <i class="fa fa-barcode" style="font-size:20px"></i>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Scan QR at Entrance</h2>
            <p class="leading-relaxed">Now use the generted QR as a key to enter in institution .You just need to scan the QR Code at QR Scanner attached at gate.</p>
          </div>
        </div>
        <div class="flex relative pb-12">
          <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
          </div>
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
           <i class="fa fa-barcode" style="font-size:20px"></i>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">Enter In institution</h2>
            <p class="leading-relaxed">VHS cornhole pop-up, try-hard 8-bit iceland helvetica. Kinfolk bespoke try-hard cliche palo santo offal.</p>
          </div>
        </div>
        <div class="flex relative">
          <div class="flex-shrink-0 w-10 h-10 rounded-full bg-indigo-500 inline-flex items-center justify-center text-white relative z-10">
           <i class="fa fa-" style="font-size:20px"></i>
          </div>
          <div class="flex-grow pl-4">
            <h2 class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider">FINISH</h2>
            <p class="leading-relaxed">After authentication you will be able to Enter.</p>
          </div>
        </div>
      </div>
      <img class="lg:w-3/5 md:w-1/2 object-cover object-center rounded-lg md:mt-0 mt-12" src="<?=base_url()?>assets/dashboard.png" alt="step">
    </div>
  </div>
</section>
<!-- working map -->

<!-- registered user -->
<section id="RegisterdUser" class="text-gray-700 body-font">
    <div class="flex flex-col text-center w-full mb-3  px-5 py-5">
                <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900">Registers Users</h1>
    </div>
  <div class="container px-5 py-10 mx-auto">
    <div class="flex flex-wrap -m-4 text-center">
      <div class="p-4 sm:w-1/4 w-1/2">
        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">300</h2>
        <p class="leading-relaxed">Students</p>
      </div>
      <div class="p-4 sm:w-1/4 w-1/2">
        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">80</h2>
        <p class="leading-relaxed">Faculties</p>
      </div>
      <div class="p-4 sm:w-1/4 w-1/2">
        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">35</h2>
        <p class="leading-relaxed">Visitors</p>
      </div>
      <div class="p-4 sm:w-1/4 w-1/2">
        <h2 class="title-font font-medium sm:text-4xl text-3xl text-gray-900">4</h2>
        <p class="leading-relaxed">Others</p>
      </div>
    </div>
  </div>
</section>
<!-- registered user -->

<!-- team -->
<section id="team" class="text-gray-700 body-font">
  <div class="container px-20 py-20 mx-auto">
    <div class="flex flex-col text-center w-full mb-10">
      <h1 class="text-2xl font-medium title-font mb-4 text-gray-900 tracking-widest">OUR TEAM</h1>
      <!-- <p class="lg:w-2/3 mx-auto leading-relaxed text-base">Whatever cardigan tote bag tumblr hexagon brooklyn asymmetrical gentrify, subway tile poke farm-to-table. Franzen you probably haven't heard of them.</p> -->
    </div>
    <div class="flex flex-wrap -m-4">
     
      <div class="p-4 lg:w-1/2">
        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
          <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="<?=base_url()?>assets/team/arcpreet.jpg">
          <div class="flex-grow sm:pl-8">
            <h2 class="title-font font-medium text-lg text-gray-900">Preet Kumar Sahu</h2>
            <h3 class="text-gray-500 mb-3">PHP Developer & UI Designning </h3>
            <p class="mb-4"></p>
            <span class="inline-flex">
              <a class="text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </div>
      <div class="p-4 lg:w-1/2">
        <div class="h-full flex sm:flex-row flex-col items-center sm:justify-start justify-center text-center sm:text-left">
          <img alt="team" class="flex-shrink-0 rounded-lg w-48 h-48 object-cover object-center sm:mb-0 mb-4" src="<?=base_url()?>assets/team/kunal.jpg">
          <div class="flex-grow sm:pl-8">
            <h2 class="title-font font-medium text-lg text-gray-900">Kunal Nag</h2>
            <h3 class="text-gray-500 mb-3">Android & UI Developer</h3>
            <p class="mb-4"></p>
            <span class="inline-flex">
              <a class="text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
                </svg>
              </a>
              <a class="ml-2 text-gray-500">
                <svg fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
                  <path d="M21 11.5a8.38 8.38 0 01-.9 3.8 8.5 8.5 0 01-7.6 4.7 8.38 8.38 0 01-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 01-.9-3.8 8.5 8.5 0 014.7-7.6 8.38 8.38 0 013.8-.9h.5a8.48 8.48 0 018 8v.5z"></path>
                </svg>
              </a>
            </span>
          </div>
        </div>
      </div>
     
    </div>
  </div>
</section>
<!-- team -->

<!-- contact -->


<!-- contact -->

    <!-- footer -->
    <footer class="text-gray-700 body-font mt-20">
        <div class="container px-5 py-8 mx-auto flex items-center sm:flex-row flex-col ">
            <!-- <a href="http://www.nitrr.ac.in/ " class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900 ">
                <svg xmlns="http://www.w3.org/2000/svg " fill="none " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full " viewBox="0 0 24 24 ">
        <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5 "></path>
      </svg> -->
        <img src="<?= base_url()?>assets/favicon/logo.png" ?>
                <span class="ml-3 text-xl ">Smart Gate Entrance</span>
            </a>
            <p class="text-sm text-gray-500 sm:ml-4 sm:pl-4 sm:border-l-2 sm:border-gray-200 sm:py-2 sm:mt-0 mt-4 ">© 2020 Smart Gate Entrance —
                <a href="https://twitter.com/knyttneve " class="text-gray-600 ml-1 " rel="noopener noreferrer " target="_blank ">@NIT Raipur</a>
            </p>
            <span class="inline-flex sm:ml-auto sm:mt-0 mt-4 justify-center sm:justify-start ">
      <a class="text-gray-500 " href="https://www.facebook.com/nit.raipur.5">
        <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-5 h-5 " viewBox="0 0 24 24 ">
          <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z "></path>
        </svg>
      </a>
      <a class="ml-3 text-gray-500 " href="https://twitter.com/nitrr?lang=en" >
        <svg fill="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="2 " class="w-5 h-5 " viewBox="0 0 24 24 ">
          <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z "></path>
        </svg>
      </a>
     
      <a class="ml-3 text-gray-500 " href="https://www.linkedin.com/school/national-institute-of-technology-raipur/?originalSubdomain=in">
        <svg fill="currentColor " stroke="currentColor " stroke-linecap="round " stroke-linejoin="round " stroke-width="0 " class="w-5 h-5 " viewBox="0 0 24 24 ">
          <path stroke="none " d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z "></path>
          <circle cx="4 " cy="4 " r="2 " stroke="none "></circle>
        </svg>
      </a>
    </span>
        </div>
    </footer>
    <!-- footer -->


</BODY>

</html>