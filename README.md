 <h1> Tasks</h1>
1. Select mysql to table (with css)<br>
2. Send email from php with attachment<br>
3. Import/export MySQL <-> XLSX<br>
4. Send text to telegram bot user<br>
5. Export table to PDF
<br>
<br>

Requirements:
<ul>
<li>PHP v7.1+</li>
<li>MySQL v5.7+</li>
<li>Apache 2.0+</li>
</ul>

<p>All logic files in <b>App/.</b> directory. Also there is Database.php this is connection to DB.</p>
<p><b>App/Models</b> have database queries.</p>
<p><b>App/Views</b> directory consist a simple web pages.</p>
<p>For correct project working you need:</p>

<ul>
<li>rename <i>.env.example</i> to <i>.env</i> and configure file(only database; <i>Email</i> and <i>Telegram Bot</i> <b>do not change</b>) according to your settings.</li>
<li>import soft.sql in your database</li>
<li>install all dependencies: <pre>composer install<pre></li>
</ul>