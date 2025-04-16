<?php

namespace Pentiminax\UX\Editor;

use Pentiminax\UX\Editor\Enum\BlockType;
use Pentiminax\UX\Editor\Model\Block\AbstractBlock;
use Pentiminax\UX\Editor\Model\Data\ChecklistItem;
use Pentiminax\UX\Editor\Model\Data\EmbedData;
use Pentiminax\UX\Editor\Model\Data\HeaderData;
use Pentiminax\UX\Editor\Model\Data\ParagraphData;

class MarkdownConverter
{
    /**
     * @param AbstractBlock[] $blocks
     */
    public static function convertToMarkdown(array $blocks): string
    {
        $markdown = '';

        foreach ($blocks as $block) {
            switch ($block->getType()) {
                case BlockType::HEADER:
                    /** @var HeaderData $data */
                    $data = $block->getData();
                    $level = str_repeat('#', $block->getData()->level->value);
                    $markdown .= "$level $data->text\n\n";
                    break;
                case BlockType::PARAGRAPH:
                    /** @var ParagraphData $data */
                    $data = $block->getData();
                    $markdown .= "{$data->text}\n\n";
                    break;
                case BlockType::CHECKLIST:
                    /** @var ChecklistItem $item */
                    foreach ($block->getData()->items as $item) {
                        $checked = $item->checked ? '[x]' : '[ ]';
                        $markdown .= "- $checked $item->text\n";
                    }

                    $markdown .= "\n";
                    break;
                default:
                    // Handle other block types or ignore them
                    break;
            }
        }

        return $markdown;
    }
}