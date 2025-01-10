@extends('HuongNghiep.Frontend.layouts.layout_trang_phu')
@section('header')
    @include('HuongNghiep.Frontend.partials.header.header_2')
@endsection
@section('content')

<div class="other_pages with_tabs">
    <div class="grid-container transparent max-width-1064">
        <div class="grid-x">
            <div class="large-12 cell">
                <h1 class="medium-mar-bot-20">Câu thường gặp - FAQs</h1>
            </div>
        </div>
        <div class="accordion-tabs-block faq">
            <div class="accordion-tabs-holder">
                <div class="grid-container">
                    <div class="grid-x">
                        <div class="small-12 cell">
                            <ul class="live tabs" id="faqTabs">
                                <li class="tabs-title is-active live" role="presentation">
                                    <a href="#panel1b" role="tab" aria-controls="panel1b" id="panel1b-label" tabindex="0">Tài khoản người dùng</a>
                                </li>
                                <li class="tabs-title" role="presentation">
                                    <a href="#panel2b" role="tab" aria-controls="panel2b" aria-selected="false" id="panel2b-label" tabindex="-1">Đơn giá & Thanh toán</a>
                                </li>
                                <li class="tabs-title" role="presentation">
                                    <a href="#panel3b" role="tab" aria-controls="panel3b" aria-selected="false" id="panel3b-label" tabindex="-1">Bài trắc nghiệm</a>
                                </li>
                                <li class="tabs-title" role="presentation">
                                    <a href="#panel4b" role="tab" aria-controls="panel4b" aria-selected="false" id="panel4b-label" tabindex="-1">Báo cáo tư vấn
                                       </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-container">
                <div class="grid-x grid-padding-x">
                    <div class="large-12 cell content">
                        <div class="tabs-content" data-tabs-content="faqTabs">
                            <div class="tabs-panel is-active" id="panel1b" role="tabpanel" aria-labelledby="panel1b-label">
                                <div class="accordion-item--responsive">
                                    <a href="#panel1b" class="accordion-anchor--responsive">Account</a>
                                    <div class="grid-x grid-padding-x accordion-content--responsive" style="display: flex;">
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Do I need an account to take any tests?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. An account with a valid email is required in order to use CareerHunter and begin taking tests. To access full reporting and your career matches, paid access will however be required. Refer to our <a href="get-access.html">Get Access</a> page for further details.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How can I create an account?</a>
                                                    <div class="accordion-content">
                                                        <p>You can create your CareerHunter account on the
                                                            <a href="register.html">registration</a> page. Simply enter your full name, email address and
                                                            password and click ‘Register’, or register with your Facebook or Google account.</p>
                                                        <p>Upon successful registration, please check your inbox to confirm your account and begin
                                                            taking the CareerHunter tests.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I didn’t receive a confirmation email when I signed up.
                                                        What should I do?</a>
                                                    <div class="accordion-content">
                                                        <p>If you haven’t received a confirmation email when creating your CareerHunter account,
                                                            please check your junk or spam folder first. If you can’t find your confirmation email
                                                            there, go to the <a href="login.html">login</a> page, enter your email address, click ‘Next’
                                                            and then click ‘Resend’ to resend the confirmation email. If that doesn’t work, please
                                                            <a href="contact.html">contact us</a>.</p>
                                                        <p>Please note that confirmation emails are automatically sent out by our system. We cannot
                                                            control how quickly your email provider will take to deliver the email to your inbox.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I forgot my password. What do I do?</a>
                                                    <div class="accordion-content">
                                                        <p>If you can’t remember your password, you’ll need to reset it and create a new one.</p>
                                                        <p>You can do this by navigating to the <a href="login.html">Login</a> page and clicking ‘Forgot
                                                            password’, where you’ll be prompted to enter the email address you used to sign up to
                                                            CareerHunter. Follow the on-screen instructions and then check your inbox for a password
                                                            reset email.</p>
                                                    </div>
                                                </li>

                                            </ul>
                                        </div>
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How can I change my details?</a>
                                                    <div class="accordion-content">
                                                        <p>You can change your name, email address, password and country in your Account
                                                            Settings.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How can I delete my account?</a>
                                                    <div class="accordion-content">
                                                        <p>We’re sorry to hear that you want to delete your account. Please
                                                            <a href="contact.html">contact us</a> if you have
                                                            any concerns about your account or feedback for us.</p>
                                                        <p>To delete your account, go to your Account Settings, click the ‘Delete account’ button at
                                                            the bottom of the page and follow the on-screen instructions.</p>
                                                        <p>Please note that this will permanently delete your account and all progress associated
                                                            with it. You cannot undo this action, so please make sure you really don’t need your
                                                            account anymore.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Can I reactivate my account after I’ve deleted in?</a>
                                                    <div class="accordion-content">
                                                        <p>Unfortunately, no. Deleting your account is permanent and irreversible. All progress,
                                                            including test results and career matches, will be lost and cannot be revived.</p>
                                                        <p>If you later change your mind, you will need to create a new account, purchase full
                                                            access to the CareerHunter platform and take all six tests all over again.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How do I control the email notifications I receive?</a>
                                                    <div class="accordion-content">
                                                        <p>You can control what emails you receive from us by navigating to your Account Settings.
                                                            In the ‘Notifications’ area, select or deselect which notifications you’d like to
                                                            receive.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" id="panel2b" role="tabpanel" aria-labelledby="panel2b-label">
                                <div class="accordion-item--responsive">
                                    <a href="#panel2b" class="accordion-anchor--responsive">Pricing and Payment</a>
                                    <div class="grid-x grid-padding-x accordion-content--responsive" style="display: flex;">
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How much does it cost?</a>
                                                    <div class="accordion-content">
                                                        <p>You can try any of the three statement tests prior to deciding to pay for access. You’ll then need to upgrade in order to see all test insights, full reporting and recommendations, job and course suggestions, and enjoy the full career matching experience.</p>
                                                        <p>Individual test access is typically charged at $15.99, while full access to CareerHunter is $79.99, although we do offer a <a href="student-discount.html">Student Discount</a>. Refer to our <a href="get-access.html">Get Access</a> page to proceed to gain access.</p>

                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Do you charge a subscription?</a>
                                                    <div class="accordion-content">
                                                        <p>No. CareerHunter’s displayed prices are one-time charges, so you’ll get lifetime access to your account and tests for the fee specified. If you happen to exhaust your test takes, you can proceed to purchase retakes at a 50% reduced price from within your account.
                                                        </p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What is the difference between individual and full access?</a>
                                                    <div class="accordion-content">
                                                        <p>With individual test access you’ll be able to view the full results, test insights and recommendations on any single purchased test. Full access on the other hand grants you complete access to CareerHunter’s six tests all results, as well as your course and job suggestions, career report and final career matches. </p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How can I proceed to pay?</a>
                                                    <div class="accordion-content">
                                                        <p>You can proceed to purchase access to any of the tests or full access to all areas from our <a href="get-access.html">Get Access</a> page. After selecting your preferred level of access, you can then proceed to checkout and choose your desired payment method.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What payment methods do you offer?</a>
                                                    <div class="accordion-content">
                                                        <p>We accept most major credit, debit and prepaid cards, including Visa, Mastercard, American Express, China UnionPay, and Cartes Bancaires (dependent on your region). We also accept payments via PayPal and Apple Pay. </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I have a coupon code – how can I redeem it?</a>
                                                    <div class="accordion-content">
                                                        <p>To redeem a coupon code, simply enter the code into the ‘Coupon code’ field at checkout. Make sure to click ‘Apply’ in order to reflect on the final price. Please note that we’re unable to credit or refund any unused coupon codes, and coupons and any offers cannot be combined.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Can I purchase access to CareerHunter for someone else?</a>
                                                    <div class="accordion-content">
                                                        <p>If you are purchasing test access for a friend, family member, colleague or student, simply enter their email address at checkout so they can access the account. They’ll then receive a notification of their access via email.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Do you offer discounts to students?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. We offer a 30% student discount to access any tests or on full access. Note that we only accept emails provided by verifiable educational institutes. For more information and eligibility requirements, please visit our <a href="student-discount.html">Student Discount</a> page.</p>
                                                        <p>We also run occasional sales and offers on access to CareerHunter, which are advertised over on our sister site <a href="https://www.careeraddict.com/" target="_blank">CareerAddict</a> and through <a href="https://www.wethrift.com/careerhunter" target="_blank">Wethrift</a>, so be sure to keep an eye out for the latest deals and coupons!</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Will I get a discount on full access if I buy individual test access first?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. We’ll automatically deduct the cost of individual tests on the full access price, so you won’t overpay if you decide to proceed to buying full experience later.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I’m not happy with my purchase. Can I get a refund?</a>
                                                    <div class="accordion-content">
                                                        <p>We’re sorry to hear that you’re not satisfied with your CareerHunter experience. <a href="contact.html">Contact Us</a> and make sure to explain what aspect of the test or your results you were dissatisfied with. We’ll then do our best to find a solution for you. If we can’t work things out, we’ll be happy to issue a refund for you (terms and conditions apply).</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" id="panel3b" role="tabpanel" aria-labelledby="panel3b-label">
                                <div class="accordion-item--responsive">
                                    <a href="#panel3b" class="accordion-anchor--responsive">Tests</a>
                                    <div class="grid-x grid-padding-x accordion-content--responsive" style="display: flex;">
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How long does it take to complete the tests?</a>
                                                    <div class="accordion-content">
                                                        <p>It takes about 2 hours and 40 minutes to complete all 6 tests:</p>
                                                        <ul class="accordion-content__list">
                                                            <li>Career Interests Test – about 20 minutes</li>
                                                            <li>Work Personality Test – about 40 minutes</li>
                                                            <li>Career Motivators Test – about 30 minutes</li>
                                                            <li>Abstract Reasoning Test – 10 minutes, timed</li>
                                                            <li>Numerical Reasoning Test – 30 minutes, timed</li>
                                                            <li>Verbal Reasoning Test – 30 minutes, timed</li>
                                                        </ul>
                                                        <p>The tests don’t need to be completed all in one go. You can take breaks in between
                                                            tests
                                                            or even spread them across a week or a longer period.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Can I pause the tests and return to them later?</a>
                                                    <div class="accordion-content">
                                                        <p>You can pause the Career Interests, Work Personality and Career Motivators Test at any
                                                            time while completing them. Simply navigate to the ‘Overview’ page of the relevant test
                                                            and click ‘Save and continue later’. Your progress will be saved, and you can pick up
                                                            from
                                                            where you left off at a more convenient time.</p>
                                                        <p>The Abstract, Numerical and Verbal Reasoning Tests are timed tests. Once you start
                                                            them,
                                                            they cannot be paused. If you exit any of these tests, you will lose your progress and
                                                            you
                                                            will need to restart them from the beginning.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Can I take the tests if I already have a job?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes! Anyone can take the tests, whether they’re currently employed, still in school or
                                                            recent graduates.</p>
                                                        <p>Whatever your career situation, CareerHunter is open to anyone who is interested in
                                                            identifying which careers match their interests, personality, motivations and
                                                            skills.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Are the tests reliable?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. The CareerHunter tests have undergone extensive validity and reliability testing
                                                            by
                                                            trusted experts within the fields of psychology and psychometry.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Who created the tests?</a>
                                                    <div class="accordion-content">
                                                        <p>The CareerHunter tests were written by a team of psychologists, psychometricians,
                                                            developers and career experts with years of experience in their relevant fields.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Can I retake a test?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. With paid access it includes two takes for each test. Additional retakes can be purchased at a 50% reduced fee. To retake a test, simply look for the relevant test’s ‘Retake’ icon on the results page or from within the ‘Test Progress’ area in your Dashboard.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What languages are the tests available in?</a>
                                                    <div class="accordion-content">
                                                        <p>CareerHunter is currently only available in English, though we have plans to translate
                                                            our tests into other languages in the future. Stay tuned for updates!</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I submitted an incomplete test. Does it matter?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. Submitting an incomplete test can adversely impact your overall results and
                                                            consequently generate inaccurate career matches.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">I have a color-deficiency, will this affect my results?</a>
                                                    <div class="accordion-content">
                                                        <p>You shouldn’t have much difficulty completing our tests if you’re color-deficient. That said, our Abstract Reasoning Test requires you to identify the missing image in a sequence of shapes of different sizes and colors. While we made every effort to make these colors distinguishable to all users of the CareerHunter platform, you might have trouble identifying the correct image, and this could hinder your performance.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tabs-panel" id="panel4b" role="tabpanel" aria-labelledby="panel4b-label">
                                <div class="accordion-item--responsive">
                                    <a href="#panel3b" class="accordion-anchor--responsive">Results and Matches</a>
                                    <div class="grid-x grid-padding-x accordion-content--responsive" style="display: flex;">
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Where can I see my results?</a>
                                                    <div class="accordion-content">
                                                        <p>You can view your test results immediately after you complete a test, or you can visit your Dashboard area. Your Dashboard displays all your test progress and is instantly updating as and when you complete a test. </p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Do I get a report?</a>
                                                    <div class="accordion-content">
                                                        <p>Yes. Each test comes with its own personalized report which is also downloadable, with useful insights into how you scored, and recommendations. If you have paid for <a href="upgrade.html">Full Access</a>, you’ll also get a complete career report, detailing all your career matches.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">Where can I find my reports?</a>
                                                    <div class="accordion-content">
                                                        <p>Once you’ve completed any test on CareerHunter, we’ll generate a personalized report. All reports are stored in your Dashboard and can easily be downloaded to PDF.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What is the career report?</a>
                                                    <div class="accordion-content">
                                                        <p>The career report is a final report which you'll get once all six tests are complete. It showcases all careers from our database, how you match to each, salary prospects, job outlook, qualification requirements, and more! Only available with <a href="upgrade.html">Full Access</a>.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What is a career match?</a>
                                                    <div class="accordion-content">
                                                        <p>A career match is where we use our technology to attribute a final percentage (%) as an indication of your overall compatibility to a specific career. CareerHunter takes your interests, personality, motivations and aptitudes all into account when suggesting potential careers to you and generating the percentage using our unique algorithm. </p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="large-6 small-12 cell">
                                            <ul class="accordion nested">

                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">When do I get my career matches?</a>
                                                    <div class="accordion-content">
                                                        <p>In order to generate your career matches, you’ll need to purchase <a href="upgrade.html">Full Access</a> and complete all six tests. CareerHunter will then compile all your test scores and match you against our database of careers, instantly, using our unrivaled and reliable algorithm. </p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">When do I get my job and course suggestions?</a>
                                                    <div class="accordion-content">
                                                        <p>You’ll only generate more accurate course you job suggestions, along with your final career matches, once all six tests are complete and you have attained <a href="upgrade.html">Full Access</a>. </p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">How are my matches generated?</a>
                                                    <div class="accordion-content">
                                                        <p>The results of all your six tests are compiled, processed, and put through our unique algorithm, all of which was developed by a team of psychologists, psychometricians and the experts over on CareerAddict. Our advanced technology then generates your personalized career matches according to your unique set of results.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What if some career matches don’t make sense?</a>
                                                    <div class="accordion-content">
                                                        <p>It is normal and expected for your final career matches to not always completely align with your professional aspirations. As CareerHunter uses your interest, personality, motivator and aptitude scores, we are looking at your overall compatibility on a psychometric level so it’s normal to expect some surprises.</p>
                                                        <p>For example, let’s say you want to become a teacher. This profession generally requires an extrovert personality, but if you prefer working independently, you will receive higher career matches that are more suitable to your introvert personality, while also taking into consideration your other results.</p>
                                                        <p>That being said, if you feel many of your career matches don’t make any sense, reach out to us and we’ll investigate.</p>
                                                    </div>
                                                </li>
                                                <li class="accordion-item">
                                                    <a href="#" class="accordion-title">What do my career matches indicate?</a>
                                                    <div class="accordion-content">
                                                        <p>Your career matches indicate through psychometric and educated analysis, viable career directions and options you should consider pursuing, and those which may or may not do well in. All insights are based on your current thinking cognitive state at the point of testing, so it’s advised to seek further advice and not rely solely on any test to determine your exact career goals - despite our conﬁdence in your test results at CareerHunter.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="blue-blk at-bottom">
    <div class="grid-container">
        <div class="grid-x text-center">
            <div class="small-12 cell">
                <h2 class="blue-blk__title blue-blk__title--with-mrg before-fade-in fade-in">Không thể tìm thấy câu trả lời cho câu hỏi của bạn?</h2>
                <a href="contact.html" class="button button--green before-fade-in fade-in">Liên hệ<span class="button__hovered" style="top: 30.5px; left: 3.16248px;"></span></a>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
    @include('HuongNghiep.Frontend.partials.footer.footer_1')
@endsection