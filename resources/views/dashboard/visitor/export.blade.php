<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,500;0,600;0,700;0,800;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Courier+Prime:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    {{-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet"> --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    width: {
                        'doc': '800px',
                    }
                },
                fontSize:{
                    'xxs': '10.5px',
                    'text-sm': '12px'
                }
            }
        }
    </script>
    <style>
        *{
            font-family: 'Open Sans', sans-serif;
        }
        .gray-text{
            /* color: transparent;
            text-shadow: 2px 0 #646b79; */
            color: #646b79;
        }
        .client__info, .client__info label, .client__info span{
            font-family: 'Courier Prime', monospace !important;
            font-weight: 900;
            font-size: 10px;
        }

        .client__secretInfo,.client__secretInfo label, .client__secretInfo span{
            font-weight: 700;
            font-size: 11px;
        }
    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
</head>
<body class="md:bg-transparent bg-gray-200">
<main id="divToExport" class="w-doc mx-auto px-4 py-4 md:block hidden">
    <!-- Header -->
    <div class="flex justify-between items-start">
        <div class="w-10/12 flex gap-8 items-end">
            <img height="180px" width="180px" src="{{URL('storage/img/menaLabs.png')}}" alt="">
            <img height="100px" width="100px" src="{{URL('storage/img/cap.png')}}" alt="">
            <h3 class="text-lg gray-text">CPS Clinical Pathology Services</h3>
        </div>
        <div class="w-2/12 flex justify-end relative">
            <img class="absolute top-0 right-0" id="qrHolder" height="90" width="90" src="#" alt="">
            <input id="userId" type="hidden" value="{{ $user['id']}}">
            {{-- <img height="70" width="70" src="{{URL('storage/img/qrSample.png')}}" alt=""> --}}
        </div>
    </div>
    <!-- /Header -->
    <!-- Client info -->
    <div class="flex flex-col mt-10">
        <div class="w-6/12">
            <ul class="">
                <li class="flex client__info">
                    <label class="flex-1" for="name">Name:</label>
                    <span class="flex-1">{{ $user['name']}}</span>
                </li>
                <li class="flex client__info">
                    <label class="flex-1" for="MRN">MRN:</label>
                    <span class="flex-1">{{$user->mrn}}</span>
                </li>
                <li class="flex client__info">
                    <label class="flex-1" for="Reference">Reference no:</label>
                    <span class="flex-1">{{$user->reference_no}}</span>
                </li>
                <li class="flex client__info">
                    <label class="flex-1" for="Gender">Gender:</label>
                    <span class="flex-1">{{$user->gender}}</span>
                </li>
                <li class="flex client__info">
                    <label class="flex-1" for="DateB">Date of birth:</label>
                    <span class="flex-1">{{$user->birth_date}}</span>
                </li>
                <li class="flex client__info">
                    <label class="flex-1" for="Location">Location:</label>
                    <span class="flex-1">{{$user->location}}</span>
                </li>
            </ul>
        </div>
        <div class="flex items-end -mt-3">
            <div class="w-8/12">
                <h6 class="font-bold text-md">
                    Ref By Dr
                </h6>
            </div>
            <div class="w-4/12">
                <ul class="client__secretInfo">
                    <li class="flex">
                        <label class="flex-1" for="ID">Lab ID:</label>
                        <span>{{$user->lab_id}}</span>
                    </li>
                    <li class="flex">
                        <label class="flex-1" for="Sample">Sample No:</label>
                        <span>{{$user->sample_no}}</span>
                    </li>
                    <li class="flex">
                        <label class="flex-1" for="Passport">Passport No:</label>
                        <span>{{$user->passport_no}}</span>
                    </li>
                    <li class="flex">
                        <label class="flex-1" for="Reg">Reg Date:</label>
                        <span>{{$user->reg_date}}</span>
                    </li>
                    <li class="flex">
                        <label class="flex-1" for="Collection">Collection Date:</label>
                        <span>{{$user->collection_date}}</span>
                    </li>
                    <li class="flex">
                        <label class="flex-1" for="Reporting">Reporting Date:</label>
                        <span>{{$user->reporting_date}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- /Client info -->
    <!-- PCR text -->
    <h3 class="underline underline-offset-2 text-center mt-5 font-bold">Molecular biology</h3>
    <div class="border border-gray-600 mt-2">
        <div class="flex justify-between border-b border-gray-600 px-4">
            <h5 class="text-xs font-bold">Test</h5>
            <h5 class="text-xs font-bold">Result</h5>
            <h5 class="text-xs font-bold">Methodology</h5>
        </div>
        <div class="px-2">
            <div class="flex justify-between mt-4">
                <h5 class="text-xxs font-bold">COVID-19 by RT-PCR</h5>
                <h5 class="text-xxs font-bold">Not Detected (Negative)</h5>
                <h5 class="text-xxs">Muliplex Real Time PCR</h5>
            </div>
            <div style="font-size: 10px;" class="pl-2 text-gray-600 font-medium italic mt-2">
                <p class="mb-3">
                    Specimen: Nasopharyngeal swabl Oropharyngeal Swabl Saliva
                </p>
                <p class="mb-3">
                    Interpretation of the result:-
                </p>
                <p class="mb-3">
                    **Detected: DETECTED indicates that SARS-CoV-2 RNA is present in this specimen. Results should be interpreted in the context of allavailable laband
                    clinical findings.
                </p>
                <p class="mb-3">
                    **Not Detected: If the result is NOT DETECTED, that means the sample is negative for SARS-CoV-2/Covid-19
                </p>
                <p class="mb-3">
                    **Presumptive positive: Only one of the multiple genes is detected ora low viral load is possibl, ethis indicates that you may have the virus.Please repeat the
                    test in 72-96 hours for confirmation.
                </p>
                <p class="mb-3">
                    - A false negative result with clinical symptoms may be caused by unsuitable collection, handling, or storage of samples. It may also be caused bya sample
                    outside of the viremic phase, orby the presence of PCR inhibitors in the specimen. We recommend repeating the test on a fresh sampleif symptoms are present.
                </p>
                <p class="mb-3">
                    Limitations of the test:
                </p>
                <ol class="list-decimal pl-3 leading-5 mb-3">
                    <li>This assayhasbeen validated for use with an oropharyngeal swab and nasopharyngeal swab samples only.</li>
                    <li>This assayonly detects ORFJAB and N gene.</li>
                    <li>If the virus mutates in the rRT-PCR target region, 2019-nCoV may notbe detected or may be detected less predictably. Inhibitors or other typesof
                        interference may produce a false negative result</li>
                    <li>This test cannot rule out diseases caused by other bacterial or viral pathogens.</li>
                    <li>As all diagnostic tests, a definitive clinical diagnosis should notbe based on the result of a single test but should onlybe made after all clinicaland
                        laboratory findings have been evaluated. Collection of multiple specimens from the same patient may be necessary to detect the virus.</li>
                </ol>
                <p class="text-yellow-300 mb-2">
                    This certificate hasbeen issued electronicallyby Menalabs. Any party that relies on the result of this certificate should first check its authenticityby scanning the
                    above QR code or contacting Menalabs. Menalabs is not responsible forany misuse of this certificate or its contents
                </p>
                <h4 class="text-md text-center font-bold">End of Repor</h4>
            </div>
        </div>
    </div>
    <!-- /PCR text -->

    <!-- Stamps -->
    <div class="flex mt-5">
        <div class="flex-1 flex flex-col items-start justify-center font-bold text-xxs">
            <img height="100px" width="100px" src="{{URL('storage/img/signatureOnly.png')}}" alt="">
            <p class="mt-4" >
                Reviewed By: Dina Elamin Mohammed Ahmed<br>
            </p>
            <p class="px-5">
                Lab Technologist<br>
                DHA-85001124-001<br>
            </p>
            <p>
                Sample type: Nasopharyngeal
            </p>
        </div>
        <div class="flex-1 flex flex-col items-center">
            <img height="130px" width="130px" src="{{URL('storage/img/stamp.png')}}" alt="">
        </div>
        <div class="flex-1 flex flex-col items-center font-bold text-xxs">
            <img height="100px" width="100px" src="{{URL('storage/img/signature.png')}}" alt="">
            <p class="mt-4" >
                Approved By: Dr.Dina El Khasab.<br>
            </p>
            <p class="block">
                &nbsp;&nbsp;&nbsp;&nbsp;Lab Director/Clinical Pathologist<br>
                &nbsp;&nbsp;&nbsp;&nbsp;DHA-P-00209435-002<br>
            </p>
        </div>
    </div>
    <!-- /Stamps -->

    <h3 class="uppercase text-center mt-5">This is system generated report and doest not require physicalsignature</h3>
    <p class="text-center font-bold text-xxs">
        Al Quoz, Industrial Area 4 - P.O Box 26148, Dub ai, UAE - Tel: +971 55 538 7248 - Fax: +971 4 386 9998 - Email: <a href="mailto: customercaredxb@menalabs.com">customercaredxb@menalabs.com</a>
    </p>
</main>
<main id="mobileOnly" class="md:hidden block">
    <img src="{{URL('storage/img/mobiNav.png')}}" alt="">
    <div class="container mx-auto px-4 py-4 mobileOnly">
        <div class="text-gray-600 font-medium">
            <h4 class="text-lg uppercase">{{ $user['name']}}</h4>
            <h4 class="text-lg uppercase mt-3">COVID-19 by RT-PCR Result</h4>
            <ul class="leading-10">
                <li class="flex">
                    <label class="flex-1" for="DateB">Date of birth:</label>
                    <span class="flex-1">{{$user->birth_date}}</span>
                </li>
                <li class="flex">
                    <label class="flex-1" for="Passport">Passport No:</label>
                    <span class="flex-1">{{$user->passport_no}}</span>
                </li>
                <li class="flex">
                    <label class="flex-1" for="Reg">Request Date:</label>
                    <span class="flex-1">{{$user->reg_date}}</span>
                </li>
                <li class="flex">
                    <label class="flex-1" for="Collection">Collection Date:</label>
                    <span class="flex-1">{{$user->collection_date}}</span>
                </li>
                <li class="flex">
                    <label class="flex-1" for="Reporting">Reporting Date:</label>
                    <span class="flex-1">{{$user->reporting_date}}</span>
                </li>
            </ul>
        </div>
        <div class="mt-5  p-2 rounded-md bg-white shadow-md">
            <h5 class="text-lg font-medium border-b border-gray-200 pb-3 text-gray-600">Coronavirus, RNA (SARS-Co V-2, Real-time PCR) smear qualitative</h5>
            <p style="font-size: 14px" class="mt-2 py-3">
               COVID-19 by Rt-PCR - NOT DETECTED(NEGATIVE)
            </p>
        </div>
        <div class="mt-5  p-2 rounded-md bg-white shadow-md">
            <h5 class="text-lg font-medium border-b border-gray-200 pb-3 text-gray-600">Menalab - Dubai - UAE</h5>
        </div>
    </div>
    <div class="w-full bg-red-500 text-white">
        <div class="container mx-auto px-4 py-3 text-xxs">
            Сайт работает на Wordpress | Тема: industryup, автор Themeansar
        </div>
    </div>
    <a href="#mobileOnly" class="h-12 w-12 bg-red-600/80 rounded-full fixed right-3 bottom-3 flex items-center justify-center">
        <svg class="transform rotate-180" xmlns="http://www.w3.org/2000/svg" height="48" width="48" fill="#fff"><path d="m24 30.75-12-12 2.15-2.15L24 26.5l9.85-9.85L36 18.8Z"/></svg>
    </a>
</main>

@auth
    <button class="fixed text-uppercase text-white font-medium bottom-4 right-4 bg-green-500 rounded-full h-20 w-20 animate-bounce  items-center justify-center md:flex hidden" id="exportMe">
        <svg xmlns="http://www.w3.org/2000/svg" height="48" width="48" fill="#fff"><path d="M16.55 26.45h1.85V22.3h2.4q.8 0 1.325-.525.525-.525.525-1.325v-2.4q0-.8-.525-1.325Q21.6 16.2 20.8 16.2h-4.25Zm1.85-6v-2.4h2.4v2.4Zm6.45 6h4.2q.75 0 1.3-.525t.55-1.325v-6.55q0-.8-.55-1.325-.55-.525-1.3-.525h-4.2Zm1.85-1.85v-6.55h2.35v6.55Zm6.65 1.85h1.85V22.3h2.5v-1.85h-2.5v-2.4h2.5V16.2h-4.35ZM13 38q-1.2 0-2.1-.9-.9-.9-.9-2.1V7q0-1.2.9-2.1.9-.9 2.1-.9h28q1.2 0 2.1.9.9.9.9 2.1v28q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h28V7H13v28Zm-6 9q-1.2 0-2.1-.9Q4 42.2 4 41V10h3v31h31v3Zm6-37v28V7Z"/></svg>
    </button>
@endauth
<script>
    const getBase64Image = (url) => {
        const img = new Image();
        let imgHolder = document.getElementById('qrHolder')
        img.setAttribute('crossOrigin', 'anonymous');
        img.onload = () => {
            const canvas = document.createElement("canvas");
            canvas.width = img.width;
            canvas.height = img.height;
            const ctx = canvas.getContext("2d");
            ctx.drawImage(img, 0, 0);
            const dataURL = canvas.toDataURL("image/png");
            imgHolder.setAttribute('src',dataURL)
            console.log(dataURL)
        }
        img.src = url
    }
    let userId = document.getElementById('userId').value
    getBase64Image(`https://api.qrserver.com/v1/create-qr-code/?size=90x90&data=https://pdf.loc/show/${userId}`)
</script>
<script>
    function generatePdf(){
    var element = document.getElementById('divToExport');
    element.style.width = '800px';
    element.style.height = '1050px';
    var opt = {
        margin:       0,
        filename:     'myfile.pdf',
        image:        { type: 'jpeg', quality: 1 },
        html2canvas:  { scale: 1 },
        jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait',precision: 12 }
      };
    // choose the element and pass it to html2pdf() function and call the save() on it to save as pdf.
    html2pdf().set(opt).from(element).save();
  }
  document.getElementById('exportMe').addEventListener('click', () => {
        console.log('first')
        generatePdf()
    })
</script>
</body>
</html>
