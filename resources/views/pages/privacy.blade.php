@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Privacy Policy"
             class="object-cover w-full h-full">
        <div class="flex absolute inset-0 items-center bg-gradient-to-r from-blue-900/80 to-blue-700/60">
            <div class="container px-4 mx-auto">
                <h1 class="mb-4 text-4xl font-bold text-white md:text-5xl fade-in">Privacy Policy</h1>
                <p class="max-w-2xl text-xl text-blue-100 fade-in">How we collect, use, and protect your personal information</p>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-16">
        <div class="container px-4 mx-auto">
            <div class="mx-auto max-w-4xl">
                <div class="p-8 bg-white rounded-xl shadow-lg">
                    <div class="max-w-none prose prose-lg">
                        <p class="mb-6 text-gray-600">
                            <strong>Last updated:</strong> {{ date('F d, Y') }}
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">1. Introduction</h2>
                        <p class="mb-6 text-gray-600">
                            Al Mohandes International (AMI) is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">2. Information We Collect</h2>
                        <h3 class="mb-3 text-xl font-semibold text-gray-800">Personal Information</h3>
                        <p class="mb-4 text-gray-600">
                            We may collect personal information that you voluntarily provide to us, including:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>Name and contact information (email, phone, address)</li>
                            <li>Company information and job title</li>
                            <li>Service requests and inquiries</li>
                            <li>Payment and billing information</li>
                            <li>Technical specifications and requirements</li>
                        </ul>

                        <h3 class="mb-3 text-xl font-semibold text-gray-800">Automatically Collected Information</h3>
                        <p class="mb-4 text-gray-600">
                            We may automatically collect certain information about your device and usage patterns:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>IP address and location data</li>
                            <li>Browser type and version</li>
                            <li>Pages visited and time spent on our website</li>
                            <li>Referring website information</li>
                            <li>Device information and operating system</li>
                        </ul>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">3. How We Use Your Information</h2>
                        <p class="mb-4 text-gray-600">
                            We use the collected information for various purposes:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>Provide and maintain our services</li>
                            <li>Process service requests and inquiries</li>
                            <li>Send technical support and customer service communications</li>
                            <li>Improve our website and services</li>
                            <li>Send marketing communications (with your consent)</li>
                            <li>Comply with legal obligations</li>
                            <li>Protect against fraud and security threats</li>
                        </ul>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">4. Information Sharing and Disclosure</h2>
                        <p class="mb-4 text-gray-600">
                            We do not sell, trade, or rent your personal information to third parties. We may share your information in the following circumstances:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>With service providers who assist in our operations</li>
                            <li>With business partners for legitimate business purposes</li>
                            <li>When required by law or legal process</li>
                            <li>To protect our rights, property, or safety</li>
                            <li>In connection with a business transfer or merger</li>
                        </ul>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">5. Data Security</h2>
                        <p class="mb-6 text-gray-600">
                            We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">6. Data Retention</h2>
                        <p class="mb-6 text-gray-600">
                            We retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">7. Your Rights and Choices</h2>
                        <p class="mb-4 text-gray-600">
                            Depending on your location, you may have certain rights regarding your personal information:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>Access and review your personal information</li>
                            <li>Request correction of inaccurate information</li>
                            <li>Request deletion of your personal information</li>
                            <li>Object to processing of your personal information</li>
                            <li>Request data portability</li>
                            <li>Withdraw consent for marketing communications</li>
                        </ul>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">8. Cookies and Tracking Technologies</h2>
                        <p class="mb-4 text-gray-600">
                            We use cookies and similar tracking technologies to enhance your experience on our website:
                        </p>
                        <ul class="mb-6 space-y-2 list-disc list-inside text-gray-600">
                            <li>Essential cookies for website functionality</li>
                            <li>Analytics cookies to understand website usage</li>
                            <li>Marketing cookies for targeted advertising</li>
                            <li>Preference cookies to remember your settings</li>
                        </ul>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">9. Third-Party Links</h2>
                        <p class="mb-6 text-gray-600">
                            Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">10. International Data Transfers</h2>
                        <p class="mb-6 text-gray-600">
                            Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place to protect your information in accordance with applicable data protection laws.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">11. Children's Privacy</h2>
                        <p class="mb-6 text-gray-600">
                            Our services are not directed to children under 13 years of age. We do not knowingly collect personal information from children under 13. If we become aware that we have collected personal information from a child under 13, we will take steps to delete such information.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">12. Changes to This Privacy Policy</h2>
                        <p class="mb-6 text-gray-600">
                            We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date. We encourage you to review this Privacy Policy periodically.
                        </p>

                        <h2 class="mb-4 text-2xl font-bold text-gray-900">13. Contact Us</h2>
                        <p class="mb-4 text-gray-600">
                            If you have any questions about this Privacy Policy or our privacy practices, please contact us:
                        </p>
                        <div class="p-4 mb-6 bg-gray-50 rounded-lg">
                            <p class="text-gray-600"><strong>Al Mohandes International (AMI)</strong></p>
                            <p class="text-gray-600">Email: privacy@ami.com</p>
                            <p class="text-gray-600">Phone: +1 (555) 123-4567</p>
                            <p class="text-gray-600">Address: [Company Address]</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
