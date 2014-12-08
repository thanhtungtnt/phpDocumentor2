<?php
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 * @copyright 2010-2014 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Parser;

use JMS\Serializer\Annotation as Serializer;
use phpDocumentor\Configuration\Merger\Annotation as Merger;

/**
 * Configuration definition for the parser.
 */
final class Configuration
{
    /**
     * @var string name of the package when there is no @package tag defined.
     *
     * @Serializer\Type("string")
     * @Serializer\SerializedName("default-package-name")
     */
    private $defaultPackageName = 'global';

    /**
     * @var string destination location for the parser's output cache
     *
     * @Serializer\Type("string")
     */
    private $target;

    /**
     * @var string which visibilities to include in the docs, May be public, protected, private
     *
     * @Serializer\Type("string")
     */
    private $visibility = 'public,protected,private';

    /**
     * @var string default encoding of the files that are parsed.
     *
     * @Serializer\Type("string")
     */
    private $encoding = 'utf-8';

    /**
     * @var string[] $markers a list of codes that can be used at the beginning of a comment to have it mentioned in
     *     a special markers report.
     *
     * @Serializer\Type("array<string>")
     * @Serializer\XmlList(entry = "item")
     * @Merger\Replace
     */
    private $markers = array('TODO', 'FIXME');

    /**
     * @var string[] $extensions A list of supported file extensions used to limit the number of files to be
     *     interpreted.
     *
     * @Serializer\Type("array<string>")
     * @Serializer\XmlList(entry = "extension")
     * @Merger\Replace
     */
    private $extensions = array('php', 'php3', 'phtml');

    /**
     * @Serializer\Exclude
     * @var bool
     */
    private $shouldRebuildCache = false;

    /**
     * Returns the package name that will be given to elements when there is no `@package` tag defined or inherited.
     *
     * @return string
     */
    public function getDefaultPackageName()
    {
        return $this->defaultPackageName;
    }

    /**
     * Returns the character encoding in which the files that are to be parsed should be encoded with.
     *
     * @return string
     */
    public function getEncoding()
    {
        return $this->encoding;
    }

    /**
     * Returns the file extensions which are to be interpreted by the parser.
     *
     * @return string[]
     */
    public function getExtensions()
    {
        return $this->extensions;
    }

    /**
     * Returns which 'markers' should be scanned for and included in the markers report.
     *
     * A marker is a single word or code that directly follows an inline comment; all text following that marker
     * is interpreted as its description and these are shown in a special report generated by phpDocumentor.
     *
     * Example of a marker:
     *
     *     // TODO: This is a marker
     *
     * phpDocumentor will ignore any colon that immmediately follows the marker word; and this colon may also be
     * omitted.
     *
     * @return string[]
     */
    public function getMarkers()
    {
        return $this->markers;
    }

    /**
     * Returns the path where the product of the parsing process should be written to.
     *
     * The parsing process will output a product, usually cache, consisting of settings and the descriptors that are
     * generated during the parsing process. This product, or cache, is used in future runs to only update what has
     * actually changed and as such speed up processing.
     *
     * Because the parser's product can be omitted from the generated documentation it is possible to store the cache
     * in a central location and have the transformer output the generated documentation somewhere else.
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Returns a comma-separated list of visibilities that can be used to restrict which elements are included in the
     * documentation.
     *
     * The following values are supported: public, private and private.
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * @param string $defaultPackageName
     */
    public function setDefaultPackageName($defaultPackageName)
    {
        $this->defaultPackageName = $defaultPackageName;
    }

    /**
     * @param string $encoding
     */
    public function setEncoding($encoding)
    {
        $this->encoding = $encoding;
    }

    /**
     * @param \string[] $extensions
     */
    public function setExtensions($extensions)
    {
        $this->extensions = $extensions;
    }

    /**
     * @param \string[] $markers
     */
    public function setMarkers($markers)
    {
        $this->markers = $markers;
    }

    /**
     * @param string $target
     */
    public function setTarget($target)
    {
        $this->target = $target;
    }

    /**
     * @param string $visibility
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;
    }

    /**
     * @return boolean
     */
    public function shouldRebuildCache()
    {
        return $this->shouldRebuildCache;
    }

    /**
     * @param boolean $shouldRebuildCache
     */
    public function setShouldRebuildCache($shouldRebuildCache)
    {
        $this->shouldRebuildCache = $shouldRebuildCache;
    }
}
