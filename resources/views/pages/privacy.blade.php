@extends('layouts.app')
@section('content')
    <!-- Hero Section -->
    <section class="relative h-96 md:h-[500px] overflow-hidden">
        <img src="https://images.unsplash.com/photo-1581094794329-c8112a89af12?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80"
             alt="Privacy Policy"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 to-blue-700/60 flex items-center">
            <div class="container mx-auto px-4">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 fade-in">Privacy Policy</h1>
                <p class="text-xl text-blue-100 max-w-2xl fade-in">How we collect, use, and protect your personal information</p>
            </div>
        </div>
    </section>

    <!-- Privacy Content -->
    <section class="py-16">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto">
                <div class="bg-white rounded-xl shadow-lg p-8">
                    <div class="prose prose-lg max-w-none">
                        <p class="text-gray-600 mb-6">
                            <strong>Last updated:</strong> {{ date('F d, Y') }}
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">1. Introduction</h2>
                        <p class="text-gray-600 mb-6">
                            Al Mohandes International (AMI) is committed to protecting your privacy and ensuring the security of your personal information. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">2. Information We Collect</h2>
                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Personal Information</h3>
                        <p class="text-gray-600 mb-4">
                            We may collect personal information that you voluntarily provide to us, including:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Name and contact information (email, phone, address)</li>
                            <li>Company information and job title</li>
                            <li>Service requests and inquiries</li>
                            <li>Payment and billing information</li>
                            <li>Technical specifications and requirements</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-800 mb-3">Automatically Collected Information</h3>
                        <p class="text-gray-600 mb-4">
                            We may automatically collect certain information about your device and usage patterns:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>IP address and location data</li>
                            <li>Browser type and version</li>
                            <li>Pages visited and time spent on our website</li>
                            <li>Referring website information</li>
                            <li>Device information and operating system</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">3. How We Use Your Information</h2>
                        <p class="text-gray-600 mb-4">
                            We use the collected information for various purposes:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Provide and maintain our services</li>
                            <li>Process service requests and inquiries</li>
                            <li>Send technical support and customer service communications</li>
                            <li>Improve our website and services</li>
                            <li>Send marketing communications (with your consent)</li>
                            <li>Comply with legal obligations</li>
                            <li>Protect against fraud and security threats</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">4. Information Sharing and Disclosure</h2>
                        <p class="text-gray-600 mb-4">
                            We do not sell, trade, or rent your personal information to third parties. We may share your information in the following circumstances:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>With service providers who assist in our operations</li>
                            <li>With business partners for legitimate business purposes</li>
                            <li>When required by law or legal process</li>
                            <li>To protect our rights, property, or safety</li>
                            <li>In connection with a business transfer or merger</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">5. Data Security</h2>
                        <p class="text-gray-600 mb-6">
                            We implement appropriate technical and organizational security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction. However, no method of transmission over the internet or electronic storage is 100% secure.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">6. Data Retention</h2>
                        <p class="text-gray-600 mb-6">
                            We retain your personal information only for as long as necessary to fulfill the purposes outlined in this Privacy Policy, unless a longer retention period is required or permitted by law.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">7. Your Rights and Choices</h2>
                        <p class="text-gray-600 mb-4">
                            Depending on your location, you may have certain rights regarding your personal information:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Access and review your personal information</li>
                            <li>Request correction of inaccurate information</li>
                            <li>Request deletion of your personal information</li>
                            <li>Object to processing of your personal information</li>
                            <li>Request data portability</li>
                            <li>Withdraw consent for marketing communications</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">8. Cookies and Tracking Technologies</h2>
                        <p class="text-gray-600 mb-4">
                            We use cookies and similar tracking technologies to enhance your experience on our website:
                        </p>
                        <ul class="list-disc list-inside text-gray-600 mb-6 space-y-2">
                            <li>Essential cookies for website functionality</li>
                            <li>Analytics cookies to understand website usage</li>
                            <li>Marketing cookies for targeted advertising</li>
                            <li>Preference cookies to remember your settings</li>
                        </ul>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">9. Third-Party Links</h2>
                        <p class="text-gray-600 mb-6">
                            Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of these external sites. We encourage you to review the privacy policies of any third-party sites you visit.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">10. International Data Transfers</h2>
                        <p class="text-gray-600 mb-6">
                            Your information may be transferred to and processed in countries other than your own. We ensure appropriate safeguards are in place to protect your information in accordance with applicable data protection laws.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">11. Children's Privacy</h2>
                        <p class="text-gray-600 mb-6">
                            Our services are not directed to children under 13 years of age. We do not knowingly collect personal information from children under 13. If we become aware that we have collected personal information from a child under 13, we will take steps to delete such information.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">12. Changes to This Privacy Policy</h2>
                        <p class="text-gray-600 mb-6">
                            We may update this Privacy Policy from time to time. We will notify you of any changes by posting the new Privacy Policy on this page and updating the "Last updated" date. We encourage you to review this Privacy Policy periodically.
                        </p>

                        <h2 class="text-2xl font-bold text-gray-900 mb-4">13. Contact Us</h2>
                        <p class="text-gray-600 mb-4">
                            If you have any questions about this Privacy Policy or our privacy practices, please contact us:
                        </p>
                        <div class="bg-gray-50 rounded-lg p-4 mb-6">
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

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-ami-orange to-orange-600">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Questions About Your Privacy?</h2>
            <p class="text-xl text-orange-100 mb-8 max-w-2xl mx-auto">We're committed to transparency and protecting your personal information.</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('contact.index') }}" class="bg-white text-ami-orange px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                    Contact Privacy Team
                </a>
                <a href="{{ route('terms') }}" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-ami-orange transition">
                    Terms & Conditions
                </a>
            </div>
        </div>
    </section>
@endsection
