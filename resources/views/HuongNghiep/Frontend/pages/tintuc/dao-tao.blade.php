@extends('HuongNghiep.Frontend.layouts.layout_trang_phu')
@section('header')
    @include('HuongNghiep.Frontend.partials.header.header_1')
@endsection
@section('content')

    <div class="careers-page">
        <div data-react-class="careers/root"
             data-react-props="{&quot;user&quot;:null,&quot;initialParams&quot;:{},&quot;collection&quot;:{&quot;career_scores&quot;:[{&quot;id&quot;:151,&quot;name&quot;:&quot;Mayor&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;mayor&quot;,&quot;result_short_description&quot;:&quot;Oversee a city, town or municipality government and direct public works departments for their locale.&quot;,&quot;industry&quot;:{&quot;id&quot;:15,&quot;name&quot;:&quot;Government, Law and Politics&quot;},&quot;jobs_salary_from&quot;:&quot;21K&quot;,&quot;jobs_salary_to&quot;:&quot;100K&quot;,&quot;salary_from&quot;:&quot;68K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;N/A&quot;,&quot;study_time&quot;:&quot;N/A&quot;,&quot;projected_growth&quot;:&quot;N/A&quot;,&quot;salary_mid&quot;:116000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/329/small-Mayor.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/329/Mayor.jpg&quot;}},{&quot;id&quot;:8,&quot;name&quot;:&quot;Account Executive&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;advertising-account-executive&quot;,&quot;result_short_description&quot;:&quot;Oversee the smooth running of advertising campaigns, and liaise between clients and the creative team.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:null,&quot;jobs_salary_to&quot;:null,&quot;salary_from&quot;:&quot;57K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;5%&quot;,&quot;salary_mid&quot;:117000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/191/small-Advertising-Account-Executive.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/191/Advertising-Account-Executive.jpg&quot;}},{&quot;id&quot;:14,&quot;name&quot;:&quot;Airline Pilot&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;airline-pilot&quot;,&quot;result_short_description&quot;:&quot;Operate aircraft, such as commercial jets, to transport people and goods to destinations all over the world.&quot;,&quot;industry&quot;:{&quot;id&quot;:27,&quot;name&quot;:&quot;Transport and Logistics&quot;},&quot;jobs_salary_from&quot;:&quot;18K&quot;,&quot;jobs_salary_to&quot;:&quot;45K&quot;,&quot;salary_from&quot;:&quot;66K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:140000.0,&quot;median_salary&quot;:&quot;$140k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/195/small-Airline-Pilot.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/195/Airline-Pilot.jpg&quot;}},{&quot;id&quot;:47,&quot;name&quot;:&quot;Chief Executive&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;chief-executive&quot;,&quot;result_short_description&quot;:&quot;Manage company operations, formulate policies and ensure company goals are met.&quot;,&quot;industry&quot;:{&quot;id&quot;:6,&quot;name&quot;:&quot;Business and Management&quot;},&quot;jobs_salary_from&quot;:&quot;11&quot;,&quot;jobs_salary_to&quot;:&quot;500K&quot;,&quot;salary_from&quot;:&quot;68K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;6 years&quot;,&quot;projected_growth&quot;:&quot;-5%&quot;,&quot;salary_mid&quot;:190000.0,&quot;median_salary&quot;:&quot;$190k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/432/small-Chief-Executive.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/432/Chief-Executive.jpg&quot;}},{&quot;id&quot;:92,&quot;name&quot;:&quot;Financial Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;financial-manager&quot;,&quot;result_short_description&quot;:&quot;Oversee all aspects of an organization’s financial activities, including accounting, budgeting and investing.&quot;,&quot;industry&quot;:{&quot;id&quot;:13,&quot;name&quot;:&quot;Banking and Finance&quot;},&quot;jobs_salary_from&quot;:&quot;28&quot;,&quot;jobs_salary_to&quot;:&quot;600K&quot;,&quot;salary_from&quot;:&quot;68K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;16%&quot;,&quot;salary_mid&quot;:128000.0,&quot;median_salary&quot;:&quot;$130k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/270/small-Financial-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/270/Financial-Manager.jpg&quot;}},{&quot;id&quot;:133,&quot;name&quot;:&quot;Lawyer&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;lawyer&quot;,&quot;result_short_description&quot;:&quot;Advise and represent clients, such as individuals, businesses and governments, in legal matters.&quot;,&quot;industry&quot;:{&quot;id&quot;:15,&quot;name&quot;:&quot;Government, Law and Politics&quot;},&quot;jobs_salary_from&quot;:&quot;10&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;58K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;7 years&quot;,&quot;projected_growth&quot;:&quot;6%%&quot;,&quot;salary_mid&quot;:121000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/311/small-Lawyer.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/311/Lawyer.jpg&quot;}},{&quot;id&quot;:115,&quot;name&quot;:&quot;Green Marketer&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;green-marketer&quot;,&quot;result_short_description&quot;:&quot;Plan and oversee the advertising, marketing and promotion of environmentally friendly goods and services.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:&quot;25K&quot;,&quot;jobs_salary_to&quot;:&quot;60K&quot;,&quot;salary_from&quot;:&quot;57K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:117000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/294/small-Green-Marketer.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/294/Green-Marketer.jpg&quot;}},{&quot;id&quot;:220,&quot;name&quot;:&quot;Surgeon&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;surgeon&quot;,&quot;result_short_description&quot;:&quot;Diagnose and treat injuries, illnesses and deformities through emergency, scheduled and elective surgical operations.&quot;,&quot;industry&quot;:{&quot;id&quot;:16,&quot;name&quot;:&quot;Healthcare&quot;},&quot;jobs_salary_from&quot;:&quot;1&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;95K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;6–8 years&quot;,&quot;projected_growth&quot;:&quot;1%&quot;,&quot;salary_mid&quot;:null,&quot;median_salary&quot;:&quot;N/A&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/396/small-Surgeon.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/396/Surgeon.jpg&quot;}},{&quot;id&quot;:148,&quot;name&quot;:&quot;Marketing Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;marketing-manager&quot;,&quot;result_short_description&quot;:&quot;Organize and manage marketing campaigns to raise awareness of, and generate demand for, products and services.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:&quot;13&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;70K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;10%&quot;,&quot;salary_mid&quot;:134000.0,&quot;median_salary&quot;:&quot;$130k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/327/small-Marketing-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/327/Marketing-Manager.jpg&quot;}},{&quot;id&quot;:9,&quot;name&quot;:&quot;Advertising Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;advertising-manager&quot;,&quot;result_short_description&quot;:&quot;Coordinate with sales, financial and creative staff to promote a product or service for a company or client.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:&quot;25&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;57K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;5%&quot;,&quot;salary_mid&quot;:117000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/192/small-Advertising-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/192/Advertising-Manager.jpg&quot;}},{&quot;id&quot;:174,&quot;name&quot;:&quot;Petroleum Engineer&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;petroleum-engineer&quot;,&quot;result_short_description&quot;:&quot;Design and develop plans for extracting oil and gas from underground reservoirs for national energy needs.&quot;,&quot;industry&quot;:{&quot;id&quot;:17,&quot;name&quot;:&quot;Earth and Environment&quot;},&quot;jobs_salary_from&quot;:&quot;31K&quot;,&quot;jobs_salary_to&quot;:&quot;75K&quot;,&quot;salary_from&quot;:&quot;74K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:137000.0,&quot;median_salary&quot;:&quot;$140k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/354/small-Petroleum-Engineer.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/354/Petroleum-Engineer.jpg&quot;}},{&quot;id&quot;:188,&quot;name&quot;:&quot;Promotions Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;promotions-manager&quot;,&quot;result_short_description&quot;:&quot;Plan and coordinate programs that combine advertising and purchasing incentives to increase sales of a product or service.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:&quot;22K&quot;,&quot;jobs_salary_to&quot;:&quot;58K&quot;,&quot;salary_from&quot;:&quot;57K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:177000.0,&quot;median_salary&quot;:&quot;$180k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/360/small-Promotions-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/360/Promotions-Manager.jpg&quot;}},{&quot;id&quot;:73,&quot;name&quot;:&quot;Dentist&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;dentist&quot;,&quot;result_short_description&quot;:&quot;Provide care for a patient’s teeth, gums and other parts of the mouth, and promote good dental hygiene.&quot;,&quot;industry&quot;:{&quot;id&quot;:16,&quot;name&quot;:&quot;Healthcare&quot;},&quot;jobs_salary_from&quot;:&quot;10&quot;,&quot;jobs_salary_to&quot;:&quot;150K&quot;,&quot;salary_from&quot;:&quot;73K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;6 years&quot;,&quot;projected_growth&quot;:&quot;8%&quot;,&quot;salary_mid&quot;:107000.0,&quot;median_salary&quot;:&quot;$110k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/258/small-Dentist.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/258/Dentist.jpg&quot;}},{&quot;id&quot;:190,&quot;name&quot;:&quot;Psychiatrist&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;psychiatrist&quot;,&quot;result_short_description&quot;:&quot;Assess, diagnose and treat mental, emotional and behavioral disorders through a combination of counseling, medication and hospitalization.&quot;,&quot;industry&quot;:{&quot;id&quot;:16,&quot;name&quot;:&quot;Healthcare&quot;},&quot;jobs_salary_from&quot;:&quot;1&quot;,&quot;jobs_salary_to&quot;:&quot;230K&quot;,&quot;salary_from&quot;:&quot;76K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;8 years&quot;,&quot;projected_growth&quot;:&quot;16%&quot;,&quot;salary_mid&quot;:null,&quot;median_salary&quot;:&quot;N/A&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/364/small-Psychiatrist.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/364/Psychiatrist.jpg&quot;}},{&quot;id&quot;:182,&quot;name&quot;:&quot;Pr Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;pr-manager&quot;,&quot;result_short_description&quot;:&quot;Create and maintain relationships with the media, handle crises, and promote their company or client through positive publicity.&quot;,&quot;industry&quot;:{&quot;id&quot;:19,&quot;name&quot;:&quot;Marketing and Advertising&quot;},&quot;jobs_salary_from&quot;:&quot;22K&quot;,&quot;jobs_salary_to&quot;:&quot;120K&quot;,&quot;salary_from&quot;:&quot;64K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;8%&quot;,&quot;salary_mid&quot;:115000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/358/small-PR-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/358/PR-Manager.jpg&quot;}},{&quot;id&quot;:54,&quot;name&quot;:&quot;Compensation Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;compensation-and-benefits-manager&quot;,&quot;result_short_description&quot;:null,&quot;industry&quot;:{&quot;id&quot;:6,&quot;name&quot;:&quot;Business and Management&quot;},&quot;jobs_salary_from&quot;:&quot;20K&quot;,&quot;jobs_salary_to&quot;:&quot;170K&quot;,&quot;salary_from&quot;:&quot;71K&quot;,&quot;salary_to&quot;:&quot;210K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;5%&quot;,&quot;salary_mid&quot;:121000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/235/small-Compensation_and_benefits_manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/235/Compensation_and_benefits_manager.jpg&quot;}},{&quot;id&quot;:28,&quot;name&quot;:&quot;Astronaut&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;astronaut&quot;,&quot;result_short_description&quot;:&quot;Pilot or travel in a spacecraft, work in space, and perform activities related to human space exploration.&quot;,&quot;industry&quot;:{&quot;id&quot;:23,&quot;name&quot;:&quot;Science and Research&quot;},&quot;jobs_salary_from&quot;:&quot;18K&quot;,&quot;jobs_salary_to&quot;:&quot;21K&quot;,&quot;salary_from&quot;:&quot;49K&quot;,&quot;salary_to&quot;:&quot;200K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;N/A&quot;,&quot;salary_mid&quot;:95000.0,&quot;median_salary&quot;:&quot;$95k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/211/small-Astronaut.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/211/Astronaut.jpg&quot;}},{&quot;id&quot;:118,&quot;name&quot;:&quot;Hr Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;hr-manager&quot;,&quot;result_short_description&quot;:&quot;Oversee and manage an organization’s HR activities, including employee-related services, regulatory compliance and employee relations.&quot;,&quot;industry&quot;:{&quot;id&quot;:6,&quot;name&quot;:&quot;Business and Management&quot;},&quot;jobs_salary_from&quot;:&quot;11&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;67K&quot;,&quot;salary_to&quot;:&quot;200K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;7%&quot;,&quot;salary_mid&quot;:113000.0,&quot;median_salary&quot;:&quot;$110k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/302/small-HR-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/302/HR-Manager.jpg&quot;}},{&quot;id&quot;:40,&quot;name&quot;:&quot;Broadcast News Analyst&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;broadcast-news-analyst&quot;,&quot;result_short_description&quot;:&quot;Host and synchronize TV or radio programs to inform the public on current events and news.&quot;,&quot;industry&quot;:{&quot;id&quot;:20,&quot;name&quot;:&quot;Media and Publishing&quot;},&quot;jobs_salary_from&quot;:null,&quot;jobs_salary_to&quot;:null,&quot;salary_from&quot;:&quot;27K&quot;,&quot;salary_to&quot;:&quot;200K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;0%&quot;,&quot;salary_mid&quot;:67000.0,&quot;median_salary&quot;:&quot;$67k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/223/small-Broadcast-News-Analyst.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/223/Broadcast-News-Analyst.jpg&quot;}},{&quot;id&quot;:129,&quot;name&quot;:&quot;Judge&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;judge&quot;,&quot;result_short_description&quot;:&quot;Uphold federal, state and local laws by analyzing and interpreting all the evidence presented in a court of law.&quot;,&quot;industry&quot;:{&quot;id&quot;:15,&quot;name&quot;:&quot;Government, Law and Politics&quot;},&quot;jobs_salary_from&quot;:&quot;10&quot;,&quot;jobs_salary_to&quot;:&quot;230M&quot;,&quot;salary_from&quot;:&quot;35K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;7 years&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:134000.0,&quot;median_salary&quot;:&quot;$130k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/304/small-Judge.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/304/Judge.jpg&quot;}},{&quot;id&quot;:232,&quot;name&quot;:&quot;Training Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;training-and-development-manager&quot;,&quot;result_short_description&quot;:&quot;&quot;,&quot;industry&quot;:{&quot;id&quot;:6,&quot;name&quot;:&quot;Business and Management&quot;},&quot;jobs_salary_from&quot;:&quot;13&quot;,&quot;jobs_salary_to&quot;:&quot;130K&quot;,&quot;salary_from&quot;:&quot;64K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;8%&quot;,&quot;salary_mid&quot;:111000.0,&quot;median_salary&quot;:&quot;$110k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/411/small-Training_and_development_manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/411/Training_and_development_manager.jpg&quot;}},{&quot;id&quot;:177,&quot;name&quot;:&quot;Physicist&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;physicist&quot;,&quot;result_short_description&quot;:&quot;Plan and conduct scientific experiments and studies to test theories and discover properties of matter and energy.&quot;,&quot;industry&quot;:{&quot;id&quot;:23,&quot;name&quot;:&quot;Science and Research&quot;},&quot;jobs_salary_from&quot;:&quot;20K&quot;,&quot;jobs_salary_to&quot;:&quot;120K&quot;,&quot;salary_from&quot;:&quot;59K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;5 years&quot;,&quot;projected_growth&quot;:&quot;9%&quot;,&quot;salary_mid&quot;:121000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/355/small-Physicist.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/355/Physicist.jpg&quot;}},{&quot;id&quot;:170,&quot;name&quot;:&quot;Palaeontologist&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;palaeontologist&quot;,&quot;result_short_description&quot;:&quot;Discover and study the fossils of animals, plants, bacteria, fungi and other single-celled organisms.&quot;,&quot;industry&quot;:{&quot;id&quot;:23,&quot;name&quot;:&quot;Science and Research&quot;},&quot;jobs_salary_from&quot;:null,&quot;jobs_salary_to&quot;:null,&quot;salary_from&quot;:&quot;49K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;14%&quot;,&quot;salary_mid&quot;:91000.0,&quot;median_salary&quot;:&quot;$91k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/347/small-Palaeontologist.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/347/Palaeontologist.jpg&quot;}},{&quot;id&quot;:113,&quot;name&quot;:&quot;Geoscientist&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;geoscientist&quot;,&quot;result_short_description&quot;:&quot;Study the physical aspects of the Earth, such as its composition, structure and processes, to learn about its past, present and future.&quot;,&quot;industry&quot;:{&quot;id&quot;:23,&quot;name&quot;:&quot;Science and Research&quot;},&quot;jobs_salary_from&quot;:&quot;25&quot;,&quot;jobs_salary_to&quot;:&quot;75K&quot;,&quot;salary_from&quot;:&quot;49K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;14%&quot;,&quot;salary_mid&quot;:91000.0,&quot;median_salary&quot;:&quot;$91k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/545/small-Geoscientist-new.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/545/Geoscientist-new.jpg&quot;}},{&quot;id&quot;:191,&quot;name&quot;:&quot;Purchasing Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;purchasing-manager&quot;,&quot;result_short_description&quot;:&quot;Procure goods and services for resale or company use through supplier evaluation, contract negotiation and product quality review.&quot;,&quot;industry&quot;:{&quot;id&quot;:22,&quot;name&quot;:&quot;Sales, Retail and Purchasing&quot;},&quot;jobs_salary_from&quot;:&quot;12K&quot;,&quot;jobs_salary_to&quot;:&quot;200K&quot;,&quot;salary_from&quot;:&quot;70K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;4%&quot;,&quot;salary_mid&quot;:119000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/367/small-Purchasing-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/367/Purchasing-Manager.jpg&quot;}},{&quot;id&quot;:5,&quot;name&quot;:&quot;Actuary&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;actuary&quot;,&quot;result_short_description&quot;:&quot;Gather data and analyze statistics to calculate, measure and manage insurance risks, premiums and uncertainties.&quot;,&quot;industry&quot;:{&quot;id&quot;:13,&quot;name&quot;:&quot;Banking and Finance&quot;},&quot;jobs_salary_from&quot;:&quot;25K&quot;,&quot;jobs_salary_to&quot;:&quot;150K&quot;,&quot;salary_from&quot;:&quot;61K&quot;,&quot;salary_to&quot;:&quot;190K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;22%&quot;,&quot;salary_mid&quot;:103000.0,&quot;median_salary&quot;:&quot;$100k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/188/small-Actuary.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/188/Actuary.jpg&quot;}},{&quot;id&quot;:13,&quot;name&quot;:&quot;Air Traffic Controller&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;air-traffic-controller&quot;,&quot;result_short_description&quot;:&quot;Liaise closely with pilots and other aviation professionals to monitor and manage airspaces and airport runways.&quot;,&quot;industry&quot;:{&quot;id&quot;:27,&quot;name&quot;:&quot;Transport and Logistics&quot;},&quot;jobs_salary_from&quot;:&quot;24K&quot;,&quot;jobs_salary_to&quot;:&quot;120K&quot;,&quot;salary_from&quot;:&quot;68K&quot;,&quot;salary_to&quot;:&quot;180K&quot;,&quot;education_level&quot;:&quot;N/A&quot;,&quot;study_time&quot;:&quot;5 months&quot;,&quot;projected_growth&quot;:&quot;3%&quot;,&quot;salary_mid&quot;:125000.0,&quot;median_salary&quot;:&quot;$130k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/196/small-Air-Traffic-Controller.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/196/Air-Traffic-Controller.jpg&quot;}},{&quot;id&quot;:180,&quot;name&quot;:&quot;Postsecondary Teacher&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;postsecondary-teacher&quot;,&quot;result_short_description&quot;:&quot;Instruct students in a particular academic subject beyond the high school level.&quot;,&quot;industry&quot;:{&quot;id&quot;:10,&quot;name&quot;:&quot;Education and Training&quot;},&quot;jobs_salary_from&quot;:&quot;19K&quot;,&quot;jobs_salary_to&quot;:&quot;58K&quot;,&quot;salary_from&quot;:&quot;40K&quot;,&quot;salary_to&quot;:&quot;180K&quot;,&quot;education_level&quot;:&quot;Postgraduate&quot;,&quot;study_time&quot;:&quot;6 years&quot;,&quot;projected_growth&quot;:&quot;11%&quot;,&quot;salary_mid&quot;:78000.0,&quot;median_salary&quot;:&quot;$78k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/356/small-Postsecondary-Teacher.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/356/Postsecondary-Teacher.jpg&quot;}},{&quot;id&quot;:205,&quot;name&quot;:&quot;Sales Manager&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;sales-manager&quot;,&quot;result_short_description&quot;:&quot;Lead and supervise sales agents, and oversee the day-to-day sales operations of an organization.&quot;,&quot;industry&quot;:{&quot;id&quot;:22,&quot;name&quot;:&quot;Sales, Retail and Purchasing&quot;},&quot;jobs_salary_from&quot;:&quot;1&quot;,&quot;jobs_salary_to&quot;:&quot;180K&quot;,&quot;salary_from&quot;:&quot;59K&quot;,&quot;salary_to&quot;:&quot;170K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;5%&quot;,&quot;salary_mid&quot;:124000.0,&quot;median_salary&quot;:&quot;$120k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/381/small-Sales-Manager.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/381/Sales-Manager.jpg&quot;}},{&quot;id&quot;:25,&quot;name&quot;:&quot;Art Director&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;art-director&quot;,&quot;result_short_description&quot;:null,&quot;industry&quot;:{&quot;id&quot;:4,&quot;name&quot;:&quot;Art, Craft and Design&quot;},&quot;jobs_salary_from&quot;:&quot;4K&quot;,&quot;jobs_salary_to&quot;:&quot;970K&quot;,&quot;salary_from&quot;:&quot;52K&quot;,&quot;salary_to&quot;:&quot;170K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;5%&quot;,&quot;salary_mid&quot;:93000.0,&quot;median_salary&quot;:&quot;$93k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/208/small-Art-Director.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/208/Art-Director.jpg&quot;}},{&quot;id&quot;:90,&quot;name&quot;:&quot;Film \u0026 Video Editor&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;film-and-video-editor&quot;,&quot;result_short_description&quot;:null,&quot;industry&quot;:{&quot;id&quot;:20,&quot;name&quot;:&quot;Media and Publishing&quot;},&quot;jobs_salary_from&quot;:&quot;20K&quot;,&quot;jobs_salary_to&quot;:&quot;40K&quot;,&quot;salary_from&quot;:&quot;32K&quot;,&quot;salary_to&quot;:&quot;170K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;14%&quot;,&quot;salary_mid&quot;:63000.0,&quot;median_salary&quot;:&quot;$63k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/268/small-Film-and-Video-Editor.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/268/Film-and-Video-Editor.jpg&quot;}},{&quot;id&quot;:45,&quot;name&quot;:&quot;Chemical Engineer&quot;,&quot;score&quot;:0,&quot;path&quot;:&quot;chemical-engineer&quot;,&quot;result_short_description&quot;:&quot;Research, develop and manufacture raw materials and turn them into a wide range of usable products.&quot;,&quot;industry&quot;:{&quot;id&quot;:11,&quot;name&quot;:&quot;Engineering&quot;},&quot;jobs_salary_from&quot;:&quot;50&quot;,&quot;jobs_salary_to&quot;:&quot;500K&quot;,&quot;salary_from&quot;:&quot;65K&quot;,&quot;salary_to&quot;:&quot;170K&quot;,&quot;education_level&quot;:&quot;Undergraduate&quot;,&quot;study_time&quot;:&quot;4 years&quot;,&quot;projected_growth&quot;:&quot;8%&quot;,&quot;salary_mid&quot;:105000.0,&quot;median_salary&quot;:&quot;$110k&quot;,&quot;image&quot;:{&quot;small&quot;:&quot;https://www.careerhunter.io/uploads/images/227/small-Chemical-Engineer.jpg&quot;,&quot;original&quot;:&quot;https://www.careerhunter.io/uploads/images/227/Chemical-Engineer.jpg&quot;}}],&quot;page&quot;:1,&quot;per_page&quot;:32,&quot;total_pages&quot;:8,&quot;total_count&quot;:234},&quot;path&quot;:&quot;/careers&quot;}"
             data-react-cache-id="careers/root-0">
            <div class="filter-area">
                <div class="filter-area__container">
                    <div class="grid-container no-padding">
                        <div class="grid-x">
                            <div class="large-6 cell"><h1>Danh mục Cơ sở đào tạo</h1></div>
{{--                            <div class="large-6 cell flex-end show-for-large"><p class="filter-area__info"><span--}}
{{--                                            class="small-icons grey-tooltip-icon"></span>Complete all tests to reveal--}}
{{--                                    your matches</p></div>--}}
                        </div>
                    </div>
                    <div class="grid-container no-padding-top inner-bottom">
                        <div class="grid-x spaced-between padT10 flex-middle">
                            <div><p class="courses__heading">Đại học, Cao đẳng, Trung cấp và Trung học phổ thông</p>
                                <p class="filter-area__info hide-for-large"><span
                                            class="small-icons grey-tooltip-icon"></span>Complete all tests to reveal
                                    your matches</p></div>
                            <div class="filter-menu small-order-3 large-order-2"><p
                                        class="filter-text flex-center desktop-filter">Loại hình: </p>
                                <ul class="desktop-filter tabs filter-tabs ">
                                    <li class="filter-tabs__title"><a class="filter-tabs__link">Đại học</a></li>
                                    <li class="filter-tabs__title"><a class="filter-tabs__link">Cao đẳng</a></li>
                                    <li class="filter-tabs__title"><a class="filter-tabs__link">Trung cấp</a></li>
                                    <li class="filter-tabs__title"><a class="filter-tabs__link">Trung học phổ thông</a></li>
                                    <li class="filter-tabs__title hide-at-large"><a class="filter-tabs__link">Search</a>
                                    </li>
                                </ul>
                                <div class="filter-menu__buttons" style="display: block;">
                                    <button class="button button--white before-fade-in fade-in filter-menu__buttons__item hide-at-large">
                                        Filter<span class="button__hovered"></span></button>
                                    <div class="search-bars__container hide-at-medium-down">
                                        <div class="expanding-search expanding-search--term small-order-1 large-order-2">
                                            <label class="expanding-search__label " title="search"><span
                                                        class="small-icon expanding-search__icon expanding-search__icon--magnify magnify"></span></label><input
                                                    type="text" name="searchQuery" autocomplete="off"
                                                    placeholder="search" class="search-field expanding-search__input "
                                                    value=""><span class="small-icon plus-icon "></span></div>
                                    </div>
                                </div>
                            </div>
                            <div class="filters-container small-order-2 large-order-3 hide-at-medium-down">
                                <div class="filters-wrapper filter-tabs">
                                    <div class="grid-container filters-selection">
                                        <div class="grid-x hide-at-large filters-titles">
                                            <div class="large-12 cell">
                                                <div class="filter-text">Filter by</div>
                                            </div>
                                            <div class="large-12 cell">
                                                <div class="tabs-container">
                                                    <div class="tabs-content">
                                                        <ul class="tabs filter-tabs ">
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Suitability</a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Salary</a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Growth</a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Education</a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Search</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tabs-panel" style="height: 33px;">
                                            <div class="grid-container sub-filters-container">
                                                <div class="grid-x spaced-between padT10 flex-center">
                                                    <div class="filter-menu">
                                                        <ul class="tabs filter-tabs ">
                                                            <li class="filter-tabs__title is-active"><a
                                                                        class="filter-tabs__link">Interests <span
                                                                            class="dot"></span></a></li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Personality </a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Motivator </a>
                                                            </li>
                                                            <li class="filter-tabs__title"><a class="filter-tabs__link">Match
                                                                    % </a></li>
                                                        </ul>
                                                    </div>
                                                    <div class="filters-container small-order-2 large-order-3">
                                                        <div class="filters-wrapper sub-filters filter-tabs">
                                                            <div class="grid-container filters-selection">
                                                                <div class="tabs-panel is-active">
                                                                    <div class="grid-x grid-padding-x mar-top-10 mar-bot-10 filters__options">
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/159/small-Agriculture-and-Farming.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Agriculture and Horticulture</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/160/small-Animal-Care.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Animal Care</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/161/small-Art-and-Design.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Art, Craft and Design</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/170/small-Finance.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Banking and Finance</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/162/small-Beauty-and-Style.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Beauty and Style</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/163/small-Business-and-Management.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Business and Management</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/158/small-Administration.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Clerical and Administration</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/164/small-Computing-and-Technology.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Computers and Information
                                                                                        Technology</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/165/small-Construction-and-Trades.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Construction and Trades</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/166/small-Counselling-and-Social-Services.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Counseling and Social
                                                                                        Services</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/174/small-Land-and-Environment.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Earth and Environment</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/167/small-Education-and-Training.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Education and Training</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/168/small-Engineering.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Engineering</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/169/small-Entertainment.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Entertainment</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/171/small-Food-and-Drink.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Food and Drink</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/172/small-Government-Law-and-Politics.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Government, Law and Politics</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/173/small-Healthcare.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Healthcare</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/175/small-Manufacturing.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Manufacturing</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/176/small-Marketing-and-Advertising.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Marketing and Advertising</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/177/small-Media-and-Communication.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Media and Publishing</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/178/small-Military.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Military</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/179/small-Retail-and-Sales.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Sales, Retail and Purchasing</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/180/small-Science-and-Research.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Science and Research</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/181/small-Security-and-Emergency-Services.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Security and Emergency
                                                                                        Services</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/182/small-Sports-and-Fitness.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Sports and Fitness</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/183/small-Tourism-and-Leisure.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Tourism and Leisure</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/184/small-Transport-and-Logistics.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Transport and Logistics</p>
                                                                                </div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-center filters__apply">
                                                                        <button class="button button--filter before-fade-in fade-in">
                                                                            Done<span class="button__hovered"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="tabs-panel">
                                                                    <div class="grid-x grid-padding-x mar-top-10 mar-bot-10 filters__options">
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/138/small-Active.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Active</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/132/small-Compassionate.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Compassionate</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/139/small-Consultative.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Consultative</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/129/small-Disciplined.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Disciplined</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/128/small-Extrovert.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Extrovert</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/137/small-Ambitious.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Ambitious</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/113/small-Autonomous.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Independent</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/136/small-Behaviour-Analytical.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Behavior Analytical</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/135/small-Calm.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Calm</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/134/small-Challenging.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Challenging</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/133/small-Communicative.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Communicative</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/130/small-Coordinator.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Coordinating</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/112/small-Decisive.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Decisive</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/116/small-Fair.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Fair</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/127/small-Flexible.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Flexible</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/126/small-Forward-Thinker.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Forward Thinking</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/125/small-Methodical.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Methodical</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/124/small-Motivator.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Motivating</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/123/small-Open-to-Change.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Adaptable</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/122/small-Optimistic.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Optimistic</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/120/small-Organised.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Organized</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/131/small-Persuasive.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Persuasive</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/119/small-Practical.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Practical</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/111/small-Rational.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Rational</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/114/small-Resourceful.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Resourceful</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/121/small-Restrained.jpg&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Restrained</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/118/small-Self-Confident.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Confident</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/117/small-Sociable.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Sociable</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/115/small-Theoretical.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Theoretical</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-center filters__apply">
                                                                        <button class="button button--filter before-fade-in fade-in">
                                                                            Done<span class="button__hovered"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="tabs-panel">
                                                                    <div class="grid-x grid-padding-x mar-top-10 mar-bot-10 filters__options">
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/144/small-Recognition.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Recognition</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/140/small-Work-Environment.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Work Environment</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/146/small-Status.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Status</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/141/small-Advancement.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Advancement</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/142/small-Personal-Development.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Personal Development</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/143/small-Job-Security.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Job Security</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/145/small-Material-Rewards.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Material Rewards</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/147/small-Influence.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Influence</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/148/small-Entrepreneurship.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Entrepreneurship</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/149/small-Achievement.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Achievement</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/151/small-Fear-of-Failure.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Fear of Failure</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/150/small-Activity-Level.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Activity Level</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/152/small-Innovation.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Innovation</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/153/small-Independence.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Autonomy</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/154/small-Competition.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Competition</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/155/small-Teamwork.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Teamwork</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/156/small-Personal-Values.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Personal Values</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="filters-topic">
                                                                            <div class="grid-x filters-topic__select    ">
                                                                                <div class="filters-topic__img "
                                                                                     style="background: url(&quot;https://www.careerhunter.io/uploads/images/157/small-Personal-Interest.png&quot;) center center / cover;"></div>
                                                                                <div class="cell auto "><p
                                                                                            class="filters-topic__name">
                                                                                        Personal Interest</p></div>
                                                                                <div class="cell shrink">
                                                                                    <div class="remove"><span
                                                                                                class="small-icon green-cross"></span>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-center filters__apply">
                                                                        <button class="button button--filter before-fade-in fade-in">
                                                                            Done<span class="button__hovered"></span>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <div class="tabs-panel">
                                                                    <div class="full-height"><h2
                                                                                class="no-matches-text text-center">You
                                                                            don't have any career matches yet!</h2><a
                                                                                class="button button--with-icon button--green button--green--medium"
                                                                                href="/upgrade">Get Full Access <span
                                                                                    class="small-icons next-arrow-white-l"></span><span
                                                                                    class="button__hovered"></span></a>
                                                                    </div>
                                                                    <div class="flex-center filters__apply"><a
                                                                                class="button button--green before-fade-in fade-in button--green--big"
                                                                                href="/tests/interests/take">Get Started<span
                                                                                    class="button__hovered"></span></a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="flex-center filters__apply">
                                                <button class="button button--filter before-fade-in fade-in">Done<span
                                                            class="button__hovered"></span></button>
                                            </div>
                                        </div>
                                        <div class="tabs-panel" style="height: 33px;">
                                            <div class="aligned-checkboxes flex-center filters__options">
                                                <div class="aligned-checkboxes__item input-tick"><label><input
                                                                type="checkbox" name="no_education" value="false">
                                                        <div class="checkbox-material">
                                                            <div class="custom-checkbox"></div>
                                                        </div>
                                                        <span class="check-text">No education</span></label></div>
                                                <div class="aligned-checkboxes__item input-tick"><label><input
                                                                type="checkbox" name="high_school" value="false">
                                                        <div class="checkbox-material">
                                                            <div class="custom-checkbox"></div>
                                                        </div>
                                                        <span class="check-text">High school</span></label></div>
                                                <div class="aligned-checkboxes__item input-tick"><label><input
                                                                type="checkbox" name="undergraduate" value="false">
                                                        <div class="checkbox-material">
                                                            <div class="custom-checkbox"></div>
                                                        </div>
                                                        <span class="check-text">Undergraduate</span></label></div>
                                                <div class="aligned-checkboxes__item input-tick"><label><input
                                                                type="checkbox" name="postgraduate" value="false">
                                                        <div class="checkbox-material">
                                                            <div class="custom-checkbox"></div>
                                                        </div>
                                                        <span class="check-text">Postgraduate</span></label></div>
                                                <div class="aligned-checkboxes__item input-tick"><label><input
                                                                type="checkbox" name="vocational" value="false">
                                                        <div class="checkbox-material">
                                                            <div class="custom-checkbox"></div>
                                                        </div>
                                                        <span class="check-text">Vocational</span></label></div>
                                            </div>
                                            <div class="flex-center filters__apply">
                                                <button class="button button--filter before-fade-in fade-in">Done<span
                                                            class="button__hovered"></span></button>
                                            </div>
                                        </div>
                                        <div class="tabs-panel" style="height: 33px;">
                                            <div class="flex-center filters__apply">
                                                <button class="button button--filter before-fade-in fade-in">Done<span
                                                            class="button__hovered"></span></button>
                                            </div>
                                        </div>
                                        <div class="tabs-panel" style="height: 33px;">
                                            <div class="flex-center filters__apply">
                                                <button class="button button--filter before-fade-in fade-in">Done<span
                                                            class="button__hovered"></span></button>
                                            </div>
                                        </div>
                                        <div class="tabs-panel" style="height: 33px;">
                                            <div class="responsive-search">
                                                <div class="expanding-search expanding-search--term small-order-1 large-order-2">
                                                    <label class="expanding-search__label " title="search"><span
                                                                class="small-icon expanding-search__icon expanding-search__icon--magnify magnify"></span></label><input
                                                            type="text" name="searchQuery" autocomplete="off"
                                                            placeholder="search"
                                                            class="search-field expanding-search__input " value=""><span
                                                            class="small-icon plus-icon "></span></div>
                                                <div class="flex-center filters__apply">
                                                    <button class="button button--filter before-fade-in fade-in">
                                                        Done<span class="button__hovered"></span></button>
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
            <div class="tabs-overlay "></div>
            <div class="grid-container results-area aligned-container">
                <div class="grid-x mar-top-30 aligned-margin">
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/mayor" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/329/small-Mayor.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Mayor</p>
                                    <p class="card__salary">$68K-$210K annually</p>
                                    <p class="card__education">N/A growth | N/A | N/A</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 29.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 29.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/advertising-account-executive"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/191/small-Advertising-Account-Executive.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Account Executive</p>
                                    <p class="card__salary">$57K-$210K annually</p>
                                    <p class="card__education">5% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/airline-pilot" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/195/small-Airline-Pilot.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Airline Pilot</p>
                                    <p class="card__salary">$66K-$210K annually</p>
                                    <p class="card__education">3% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 36px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 36px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/chief-executive" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/432/small-Chief-Executive.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Chief Executive</p>
                                    <p class="card__salary">$68K-$210K annually</p>
                                    <p class="card__education">-5% growth | Postgraduate | 6 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/financial-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/270/small-Financial-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Financial Manager</p>
                                    <p class="card__salary">$68K-$210K annually</p>
                                    <p class="card__education">16% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_3">
                                    <div class="inner">
                                        <div class="fill fillAction_3" style="transform: translate(0px, 41.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_3">
                                    <div class="inner">
                                        <div class="fill fillAction_3" style="transform: translate(0px, 41.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/lawyer" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/311/small-Lawyer.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Lawyer</p>
                                    <p class="card__salary">$58K-$210K annually</p>
                                    <p class="card__education">6%% growth | Undergraduate | 7 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 25.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 25.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/green-marketer" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/294/small-Green-Marketer.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Green Marketer</p>
                                    <p class="card__salary">$57K-$210K annually</p>
                                    <p class="card__education">3% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/surgeon" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/396/small-Surgeon.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Surgeon</p>
                                    <p class="card__salary">$95K-$210K annually</p>
                                    <p class="card__education">1% growth | Postgraduate | 6–8 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_8">
                                    <div class="inner">
                                        <div class="fill fillAction_8" style="transform: translate(0px, 9.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_8">
                                    <div class="inner">
                                        <div class="fill fillAction_8" style="transform: translate(0px, 9.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/marketing-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/327/small-Marketing-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Marketing Manager</p>
                                    <p class="card__salary">$70K-$210K annually</p>
                                    <p class="card__education">10% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_1">
                                    <div class="inner">
                                        <div class="fill fillAction_1" style="transform: translate(0px, 52.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_1">
                                    <div class="inner">
                                        <div class="fill fillAction_1" style="transform: translate(0px, 52.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/advertising-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/192/small-Advertising-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Advertising Manager</p>
                                    <p class="card__salary">$57K-$210K annually</p>
                                    <p class="card__education">5% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/petroleum-engineer" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/354/small-Petroleum-Engineer.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Petroleum Engineer</p>
                                    <p class="card__salary">$74K-$210K annually</p>
                                    <p class="card__education">3% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_9">
                                    <div class="inner">
                                        <div class="fill fillAction_9" style="transform: translate(0px, 0.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_9">
                                    <div class="inner">
                                        <div class="fill fillAction_9" style="transform: translate(0px, 0.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/promotions-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/360/small-Promotions-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Promotions Manager</p>
                                    <p class="card__salary">$57K-$210K annually</p>
                                    <p class="card__education">3% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 34.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 34.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/dentist" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/258/small-Dentist.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Dentist</p>
                                    <p class="card__salary">$73K-$210K annually</p>
                                    <p class="card__education">8% growth | Postgraduate | 6 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_0">
                                    <div class="inner">
                                        <div class="fill fillAction_0" style="transform: translate(0px, 56.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_0">
                                    <div class="inner">
                                        <div class="fill fillAction_0" style="transform: translate(0px, 56.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/psychiatrist" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/364/small-Psychiatrist.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Psychiatrist</p>
                                    <p class="card__salary">$76K-$210K annually</p>
                                    <p class="card__education">16% growth | Postgraduate | 8 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 19.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 19.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/pr-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/358/small-PR-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Pr Manager</p>
                                    <p class="card__salary">$64K-$210K annually</p>
                                    <p class="card__education">8% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_2">
                                    <div class="inner">
                                        <div class="fill fillAction_2" style="transform: translate(0px, 43.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_2">
                                    <div class="inner">
                                        <div class="fill fillAction_2" style="transform: translate(0px, 43.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/compensation-and-benefits-manager"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/235/small-Compensation_and_benefits_manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Compensation Manager</p>
                                    <p class="card__salary">$71K-$210K annually</p>
                                    <p class="card__education">5% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_1">
                                    <div class="inner">
                                        <div class="fill fillAction_1" style="transform: translate(0px, 51.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_1">
                                    <div class="inner">
                                        <div class="fill fillAction_1" style="transform: translate(0px, 51.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/astronaut" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/211/small-Astronaut.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Astronaut</p>
                                    <p class="card__salary">$49K-$200K annually</p>
                                    <p class="card__education">N/A growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 18.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 18.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/hr-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/302/small-HR-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Hr Manager</p>
                                    <p class="card__salary">$67K-$200K annually</p>
                                    <p class="card__education">7% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_9">
                                    <div class="inner">
                                        <div class="fill fillAction_9" style="transform: translate(0px, 0.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_9">
                                    <div class="inner">
                                        <div class="fill fillAction_9" style="transform: translate(0px, 0.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/broadcast-news-analyst"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/223/small-Broadcast-News-Analyst.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Broadcast News Analyst</p>
                                    <p class="card__salary">$27K-$200K annually</p>
                                    <p class="card__education">0% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/judge" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/304/small-Judge.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Judge</p>
                                    <p class="card__salary">$35K-$190K annually</p>
                                    <p class="card__education">3% growth | Postgraduate | 7 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 31.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 31.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/training-and-development-manager"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/411/small-Training_and_development_manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Training Manager</p>
                                    <p class="card__salary">$64K-$190K annually</p>
                                    <p class="card__education">8% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 31.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_4">
                                    <div class="inner">
                                        <div class="fill fillAction_4" style="transform: translate(0px, 31.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/physicist" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/355/small-Physicist.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Physicist</p>
                                    <p class="card__salary">$59K-$190K annually</p>
                                    <p class="card__education">9% growth | Postgraduate | 5 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_0">
                                    <div class="inner">
                                        <div class="fill fillAction_0" style="transform: translate(0px, 57px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_0">
                                    <div class="inner">
                                        <div class="fill fillAction_0" style="transform: translate(0px, 57px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/palaeontologist" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/347/small-Palaeontologist.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Palaeontologist</p>
                                    <p class="card__salary">$49K-$190K annually</p>
                                    <p class="card__education">14% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/geoscientist" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/545/small-Geoscientist-new.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Geoscientist</p>
                                    <p class="card__salary">$49K-$190K annually</p>
                                    <p class="card__education">14% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_7">
                                    <div class="inner">
                                        <div class="fill fillAction_7" style="transform: translate(0px, 12.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_7">
                                    <div class="inner">
                                        <div class="fill fillAction_7" style="transform: translate(0px, 12.6px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/purchasing-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/367/small-Purchasing-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Purchasing Manager</p>
                                    <p class="card__salary">$70K-$190K annually</p>
                                    <p class="card__education">4% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 28.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/actuary" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/188/small-Actuary.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Actuary</p>
                                    <p class="card__salary">$61K-$190K annually</p>
                                    <p class="card__education">22% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/air-traffic-controller"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/196/small-Air-Traffic-Controller.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Air Traffic Controller</p>
                                    <p class="card__salary">$68K-$180K annually</p>
                                    <p class="card__education">3% growth | N/A | 5 months</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 27px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_5">
                                    <div class="inner">
                                        <div class="fill fillAction_5" style="transform: translate(0px, 27px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/postsecondary-teacher"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/356/small-Postsecondary-Teacher.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Postsecondary Teacher</p>
                                    <p class="card__salary">$40K-$180K annually</p>
                                    <p class="card__education">11% growth | Postgraduate | 6 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_7">
                                    <div class="inner">
                                        <div class="fill fillAction_7" style="transform: translate(0px, 18px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_7">
                                    <div class="inner">
                                        <div class="fill fillAction_7" style="transform: translate(0px, 18px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/sales-manager" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/381/small-Sales-Manager.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Sales Manager</p>
                                    <p class="card__salary">$59K-$170K annually</p>
                                    <p class="card__education">5% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 23.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 23.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/art-director" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/208/small-Art-Director.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Art Director</p>
                                    <p class="card__salary">$52K-$170K annually</p>
                                    <p class="card__education">5% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 22.2px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/film-and-video-editor"
                                                            class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/268/small-Film-and-Video-Editor.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Film &amp; Video Editor</p>
                                    <p class="card__salary">$32K-$170K annually</p>
                                    <p class="card__education">14% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_2">
                                    <div class="inner">
                                        <div class="fill fillAction_2" style="transform: translate(0px, 47.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_2">
                                    <div class="inner">
                                        <div class="fill fillAction_2" style="transform: translate(0px, 47.4px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                    <div class="large-3 medium-6 small-12 cell">
                        <div class="card card--careers "><a href="/careers/chemical-engineer" class="disable-fade-in">
                                <div class="card__image"
                                     style="background-image: url(&quot;https://www.careerhunter.io/uploads/images/227/small-Chemical-Engineer.jpg&quot;);"></div>
                                <div class="card__section card__section--careers"><p class="card__name disable-fade-in">
                                        Chemical Engineer</p>
                                    <p class="card__salary">$65K-$170K annually</p>
                                    <p class="card__education">8% growth | Undergraduate | 4 years</p>
                                    <p class="card__link">Go to Career <span
                                                class="small-icons next-arrow-green-xs"></span></p></div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 19.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="match-tank pulse_6">
                                    <div class="inner">
                                        <div class="fill fillAction_6" style="transform: translate(0px, 19.8px);">
                                            <svg version="1.1" x="0px" y="0px" width="88px" height="88px"
                                                 viewBox="0 0 88 88" enable-background="new 0 0 88 88">
                                                <path class="wave-shape" d="M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4
c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9
c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="match-percent hidden ">
                                        <div class="qm">?</div>
                                        match
                                    </div>
                                </div>
                                <div class="card__hover"></div>
                            </a></div>
                    </div>
                </div>
                <div class="hide-for-large">
                    <div class="scroll-to-top"></div>
                </div>
                <div class="grid-x flex-center">
                    <nav aria-label="Pagination">
                        <ul class="pagination text-center">
                            <li class="current"><a href="/careers">1</a></li>
                            <li class=""><a href="/careers?page=2" rel="next">2</a></li>
                            <li class=""><a href="/careers?page=3">3</a></li>
                            <li class="pagination-next"><a href="/careers?page=2" rel="next"></a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div data-react-class="adBanners/lazyPromo"
             data-react-props="{&quot;banner_code_prefix&quot;:&quot;careers&quot;}"
             data-react-cache-id="adBanners/lazyPromo-0">
            <div class="before-fade-in">
                <div class="lazyload-placeholder"></div>
            </div>
        </div>

        <div data-react-class="refreshCareerMatches/notificationUpdate"
             data-react-props="{&quot;message&quot;:null,&quot;career_matches_ready_at&quot;:null}"
             data-react-cache-id="refreshCareerMatches/notificationUpdate-0"></div>

    </div>
@endsection
@section('footer')
    @include('HuongNghiep.Frontend.partials.footer.footer_1')
@endsection
