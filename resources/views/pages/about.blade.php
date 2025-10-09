@extends('layouts.app')
@section('content')

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Additional mobile menu fix for about page
    const mobileToggle = document.querySelector('[data-mobile-toggle]');
    const mobileMenu = document.querySelector('[data-mobile-menu]');

    if (mobileToggle && mobileMenu) {
        console.log('Mobile menu elements found on about page');

        // Ensure click handler is working
        mobileToggle.addEventListener('click', function(e) {
            console.log('Mobile toggle clicked on about page');
            e.preventDefault();

            // Force toggle the menu
            if (mobileMenu.style.display === 'none' || !mobileMenu.style.display) {
                mobileMenu.style.display = 'block';
                mobileMenu.classList.add('show');
            } else {
                mobileMenu.style.display = 'none';
                mobileMenu.classList.remove('show');
            }
        });
    } else {
        console.error('Mobile menu elements not found on about page');
    }
});
</script>
@endpush
    <!-- Hero Section with Large Image -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="{{ asset('imgs/call.jpg') }}"
             alt="About AMI"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">About AMI</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">Four decades of excellence in power generation solutions</p>
            </div>
        </div>
    </section>

    <!-- Company Introduction -->
    <section class="py-16 bg-gray-50">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Story</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    Over 40 years, Al Mohandes International Co. (AMI) has grown steadily, achieving major milestones that shaped our success story.
                </p>
                <p class="mx-auto mt-4 max-w-3xl text-gray-600">
                    Throughout our journey, we have built a solid reputation in the power generation industry, step by step.
                </p>

            </div>
        </div>
    </section>

    <!-- Company History Timeline -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mb-16 text-center">
                <h2 class="mb-4 text-3xl font-bold md:text-4xl ami-blue">Our Journey</h2>
                <div class="mx-auto w-24 h-1 bg-ami-orange"></div>
                <p class="mx-auto mt-4 max-w-2xl text-gray-600">Four decades of growth, innovation, and excellence</p>
            </div>

            <div class="mx-auto max-w-4xl">
                <div class="space-y-8">
                    <!-- Timeline Item 1 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1983</div>
                        <div class="ml-8">

                            <p class="text-gray-600">Founded as a local generator service provider
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 2 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1985</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">First Step</h3>
                            <p class="text-gray-600">Imported complete generating sets.</p>
                        </div>
                    </div>

                    <!-- Timeline Item 3 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1987</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Seeking Improvement
                              Development</h3>
                            <p class="text-gray-600">Opened first panel building facility.</p>
                            <p class="text-gray-600">DAwarded key project: Supplying and installing 275 generator sets in every telecom enhancing center all over Egypt.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 4 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1991</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Trust</h3>
                            <p class="text-gray-600">Awarded NEWAGE International distributorship.
                            </p>
                        </div>
                    </div>

                    <!-- Timeline Item 5 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1993</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Growth</h3>
                            <p class="text-gray-600">Inaugurated first metal processing facility.</p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1995</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Acquired UK company</h3>
                            <p class="text-gray-600">Stamford Power Systems (SPS)
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1996</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Rise to Power	</h3>
                            <p class="text-gray-600">Opened first generator set building facility, up to 500 kVA
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">1998</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Export	</h3>
                            <p class="text-gray-600">Started exporting activity and opened Iraq branch.
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2000</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Expansion</h3>
                            <p class="text-gray-600">Opened second generator set building facility for sets between 500 kVA and 3000 KVA, low and medium voltage.</p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2003</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Regional Expansion	</h3>
                            <p class="text-gray-600">Opened Yemen branch</p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2005</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Branching Out	</h3>
                            <p class="text-gray-600">Awarded ABB authorized panel builder accreditation
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2009</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Growth</h3>
                            <p class="text-gray-600">Acquired a new production facility in the UK.</p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2010</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Branching Out</h3>
                            <p class="text-gray-600">Awarded Doosan Engines distributorship</p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2011</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Adventure</h3>
                            <p class="text-gray-600">First export contract awarded from Japan for rental purposes
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2012</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Success</h3>
                            <p class="text-gray-600">Success in Russia auxiliary Gensets for nuclear power
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2014</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Development</h3>
                            <p class="text-gray-600">Renovation of UK production facility
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                    <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2015</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Achievements</h3>
                            <p class="text-gray-600">Awarded Doosan Engines prize for best distributer in the Middle East
                            </p>
                            <p class="text-gray-600">
                                Supplied environmentally friendly generator sets for Suez Canal expansion project
                                </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2016</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Challenge</h3>
                            <p class="text-gray-600">AMI still excelling despite economic downturn
                            </p>
                        </div>
                    </div>
                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2017</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Widening</h3>
                            <p class="text-gray-600">New Local and International Markets
                            </p>
                        </div>
                    </div>

                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">2020</div>
                        <div class="ml-8">
                            <h3 class="mb-2 text-xl font-bold text-gray-900">Regional Expansion</h3>
                            <p class="text-gray-600">has new suppliers and distributers</p>
                        </div>
                    </div>

                     <!-- Timeline Item 1 -->

                     <!-- Timeline Item 1 -->
                     <div class="flex items-start">
                        <div class="flex flex-shrink-0 justify-center items-center w-16 h-16 text-lg font-bold text-white rounded-full bg-ami-blue">Present</div>
                        <div class="ml-8">

                            <p class="text-gray-600">Global leader in power solutions with clients worldwide</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@include('layouts.call-to-action')

@endsection
