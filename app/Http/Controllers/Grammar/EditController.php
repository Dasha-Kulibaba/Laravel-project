<?php

namespace App\Http\Controllers\Grammar;

use App\Models\Grammar;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Groups;
use Illuminate\View\ViewName;
use App\Models\Quotes;

class EditController extends Controller
{
	/**
	 * Handle the incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function __invoke(Request $request, Grammar $grammar)
	{
		$gr_topic = Grammar::findOrFail($grammar->id);
		$gr_contents = $gr_topic->contents;
		$groups = auth()->user()->teacher->groups;
		foreach ($gr_contents as $item) {
			if ($item->gt_type == "text") {
				$item->gt_content = strip_tags($item->gt_content, '<span>');
				$item->gt_content = ltrim($item->gt_content, "");
				$item->gt_content = rtrim($item->gt_content);
			}
		}
		$exer = $grammar->exercises;
		$rule = $grammar->rules;
		foreach ($rule as $rul) {
			$rul->rule_example = str_replace('</li>', PHP_EOL, $rul->rule_example);
			$rul->rule_example = strip_tags($rul->rule_example, '<span>');
		}
		$index = 0;
		$quote = Quotes::inRandomOrder()->first();
		return view('grammar.edit', compact('grammar', 'gr_topic', 'gr_contents', 'groups', 'rule', 'exer', 'index', 'quote'));
	}
}
