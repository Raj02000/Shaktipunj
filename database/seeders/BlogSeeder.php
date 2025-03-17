<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'title' => 'Top reasons for Australian working visa rejection',
                'image' => 'images/blog/post-2-img.jpg',
                'short_description' => 'Aliqum mullam blandit tempor sapien gravida donec ipsum, at porta justo. Velna vitae auctor congue magna tempor sodales sapien',
                'content' => '<p>Writing types in our code helps explain intent and catch mistakes like typos, null/undefined issues, etc. Some notable features in version 5.5 include inferred type predicates, regular expression syntax checking, advancements in array filtering, and more.</p>
<p>This article explores four of these improvements and compares them to the limitations of version 5.4. These features empower developers to write safer, more maintainable code, making it a vital tool in modern web development. The new features are significant:</p>
<ul>
<li>
<p>Improved Type Checking: The latest version refines type-checking algorithms, catching more subtle errors during compilation. Developers benefit from better type inference, leading to safer code.</p>
</li>
<li>
<p>Enhanced Developer Experience: New features like inferred type predicates and control flow narrowing streamline development, making code easier to read and maintain.</p>
</li>
<li>
<p>Compatibility with Existing Codebases: The language maintains backward compatibility with previous updates. Upgrading to 5.5 doesn&rsquo;t require major code changes, ensuring a smooth transition.</p>
</li>
<li>
<p>Handling Breaking Changes and Deprecations: Version 5.5 addresses deprecated features from earlier versions. Developers can adapt their code to align with the latest best practices.</p>
</li>
</ul>
<h2 id="comparison-to-typescript-54">Comparison to TypeScript 5.4</h2>
<p>The new version empowers developers with better tools, smoother transitions, and improved code quality. Some of its improvements include:</p>
<ul>
<li>
<p>Inferred Type Predicates: Unlike its predecessor, this update improves type tracking for variables, allowing better inference of types as they move through code. This enhancement catches more subtle errors during compilation, leading to safer code.</p>
</li>
<li>
<p>Control flow narrowing for constant-indexed Accesses: Enhancements in control flow analysis for constant-indexed accesses result in more accurate type narrowing when accessing properties dynamically.</p>
</li>
<li>
<p>Regular expression Syntax Checking: Basic syntax validation on regular expressions improves performance. It balances flexibility and correctness, allowing more expressive patterns without sacrificing safety.</p>
</li>
<li>
<p>Performance Optimizations: Faster build and iteration times improve productivity during development.</p>
</li>
<li>
<p>New EcmaScript Set Methods: It introduces union, intersection, difference, and symmetric difference methods for Sets. These Methods make set operations more convenient and efficient.</p>
</li>
</ul>
<h2 id="new-features-in-version-55">New Features in Version 5.5</h2>
<p>This update brings a variety of features, ensuring developers benefit from safer code, enhanced productivity, and improved language features. Here, we discuss four important features:</p>
<ul>
<li>Improvement in Array Filter.</li>
<li>Object Key inference Fixes.</li>
<li>Regular expression features.</li>
<li>Set Methods.</li>
</ul>
<h3 id="improvement-in-array-filter">Improvement in Array Filter</h3>
<p>Version 5.5 has enhanced type inference capabilities, particularly with the&nbsp;<code>filter</code>&nbsp;method. There have been significant improvements to the<code>Array.prototype.filter</code>&nbsp;method compared to the previous version. Previously, there was a struggle to infer the types correctly when filtering out null or undefined values. For example, filtering an array to remove null values did not automatically narrow the type of the resulting array.</p>
<p>The type of&nbsp;<code>filteredNums</code>&nbsp;remains&nbsp;<code>(number | null)[]</code>, even though we filtered out null values. This means you might need additional type checks later in your code.</p>',

            ],
            [
                'title' => 'Top 10 reasons why Australian working visa rejection is the worst',
                'image' => 'images/blog/post-3-img.jpg',
                'short_description' => 'Aliqum mullam blandit tempor sapien gravida donec ipsum, at porta justo. Velna vitae auctor congue magna tempor sodales sapien',
                'content' => '',
            ],
        ];

        foreach ($data as $item) {
            \App\Models\Blog::updateOrCreate(['title' => $item['title']], $item);
        }
    }
}
