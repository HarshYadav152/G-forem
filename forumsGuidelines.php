<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tech Forum Rules</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="./styles/forumsGuidelines.css">
</head>
<body>
<?php include "./partials/_header.php";?>
    <div class="container mt-4">
        <div class="text-center">
            <h1>Forum Rules & Guidelines</h1>
            <p class="text-muted">Welcome to our tech community! Please follow these rules to ensure a positive experience for everyone.</p>
        </div>
        
        <div class="nav-links">
            <a href="#"><i class="fas fa-question-circle icon"></i>FAQs</a>
            <a href="#"><i class="fas fa-shield-alt icon"></i>Privacy</a>
            <a href="#"><i class="fas fa-user-shield icon"></i>Become a Mod</a>
            <a href="#"><i class="fas fa-code icon"></i>API</a>
            <a href="#"><i class="fas fa-bug icon"></i>Report Issue</a>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>1. No Spam / Advertising / Self-promote <span class="tech-badge">ZERO TOLERANCE</span></h4>
                <p>Spam includes unsolicited advertisements, irrelevant content, and mass messaging. <span class="important">Do not ask for email addresses or phone numbers.</span> Violators will be permanently banned without warning.</p>
                <div class="d-flex align-items-center mt-2">
                    <i class="fas fa-exclamation-triangle text-warning me-2"></i>
                    <small class="text-muted">This includes DM spam and referral links</small>
                </div>
            </div>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>2. No Copyright Violations <span class="tech-badge">LEGAL</span></h4>
                <p>Sharing or requesting information on illegally obtaining copyrighted materials is strictly prohibited. This includes cracked software, pirated media, and unauthorized distribution.</p>
            </div>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>3. Keep Content Appropriate <span class="tech-badge">NSFW BAN</span></h4>
                <p>No defamation, harassment, abuse, or discrimination is allowed. This includes inappropriate images, user pictures, or any offensive content. Keep it professional.</p>
                <div class="alert alert-warning mt-2 p-2" style="background-color: rgba(255,193,7,0.1); border-left: 3px solid #ffc107;">
                    <small><i class="fas fa-info-circle me-1"></i> What's offensive is at the moderators' discretion</small>
                </div>
            </div>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>4. No Cross-Posting <span class="tech-badge">EFFICIENCY</span></h4>
                <p>Avoid posting the same question in multiple forums. Choose the most relevant category and post once. Duplicates will be locked or removed.</p>
            </div>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>5. Public Help Requests Only <span class="tech-badge">COMMUNITY</span></h4>
                <p>Post your question publicly so the community can assist and benefit from the discussion. Private messages for help are discouraged and may result in restrictions.</p>
            </div>
        </div>
        
        <div class="card rule-card mb-4">
            <div class="card-body">
                <h4>6. Respect All Members <span class="tech-badge">CORE VALUE</span></h4>
                <p>Be professional and courteous. Disagreements are fine, but personal attacks are not. We value diverse perspectives when expressed respectfully.</p>
                <div class="progress mt-2" style="height: 4px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
            </div>
        </div>
        
        <h3>General Posting Guidelines <i class="fas fa-keyboard text-info"></i></h3>
        <div class="card guideline-card mb-4">
            <div class="card-body">
                <ul class="list-unstyled">
                    <li class="mb-2"><i class="fas fa-search text-primary me-2"></i><strong>Search First:</strong> Check if your issue has been addressed before posting. Use our advanced search with keywords.</li>
                    <li class="mb-2"><i class="fas fa-heading text-primary me-2"></i><strong>Descriptive Titles:</strong> Avoid vague topics like "Help me" or "Urgent." Use specific titles like "Node.js API 400 Error on POST Request."</li>
                    <li class="mb-2"><i class="fas fa-code text-primary me-2"></i><strong>Code Formatting:</strong> Use code blocks (```) for code snippets and include error messages. Format your post for readability.</li>
                    <li class="mb-2"><i class="fas fa-clock text-primary me-2"></i><strong>Be Patient:</strong> Our community helps voluntarily. Responses may take time, especially for complex issues.</li>
                    <li><i class="fas fa-check-circle text-primary me-2"></i><strong>Mark Solutions:</strong> If someone solves your problem, mark their answer as accepted to help others.</li>
                </ul>
            </div>
        </div>
        
        <h3>Forum Policies <i class="fas fa-file-contract text-info"></i></h3>
        <div class="card guideline-card mb-4">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-user-times text-danger me-2"></i>Multiple Accounts:</strong> No duplicate accounts allowed. All extras will be banned.</p>
                        <p><strong><i class="fas fa-gavel text-danger me-2"></i>Rule Violations:</strong> Consequences include warnings, temporary bans, or permanent bans.</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong><i class="fas fa-flag text-danger me-2"></i>Reporting Issues:</strong> Use the report button or contact mods@techforum.example.com.</p>
                        <p><strong><i class="fas fa-undo text-danger me-2"></i>Appeals:</strong> Banned users may appeal after 30 days via email.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <h3>Moderator Program <i class="fas fa-user-shield text-info"></i></h3>
        <div class="card guideline-card mb-4">
            <div class="card-body">
                <p>Requirements for becoming a moderator:</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 text-center" style="width: 30px;">
                                <div style="width: 25px; height: 25px; background: var(--tech-blue); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">1</div>
                            </div>
                            <div>
                                <strong>Active Participation</strong><br>
                                Minimum 3 months with 100+ quality posts
                            </div>
                        </div>
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 text-center" style="width: 30px;">
                                <div style="width: 25px; height: 25px; background: var(--tech-purple); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">2</div>
                            </div>
                            <div>
                                <strong>Technical Knowledge</strong><br>
                                Demonstrated expertise in forum topics
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex align-items-start mb-3">
                            <div class="me-3 text-center" style="width: 30px;">
                                <div style="width: 25px; height: 25px; background: var(--tech-cyan); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">3</div>
                            </div>
                            <div>
                                <strong>Community Respect</strong><br>
                                Positive interactions and conflict resolution
                            </div>
                        </div>
                        <div class="d-flex align-items-start">
                            <div class="me-3 text-center" style="width: 30px;">
                                <div style="width: 25px; height: 25px; background: var(--tech-green); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">4</div>
                            </div>
                            <div>
                                <strong>Application Process</strong><br>
                                Nomination + approval by existing mod team
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="text-center mt-3">
                    <button class="btn btn-sm btn-outline-primary">Learn More About Moderation</button>
                </div> -->
            </div>
        </div>
        
        <div class="footer">
            <p>G-discuss Community | Last Updated January 2025</p>
            <div class="d-flex justify-content-center gap-3">
                <a href="#" class="text-muted"><i class="fab fa-github"></i></a>
                <a href="#" class="text-muted"><i class="fab fa-discord"></i></a>
                <a href="#" class="text-muted"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-muted"><i class="fab fa-stack-overflow"></i></a>
            </div>
        </div>
    </div>

<?php include "./partials/_footer.php";?>