const { registerBlockType } = wp.blocks;
const { __ } = wp.i18n;
import { InspectorControls, useBlockProps } from '@wordpress/block-editor';
import * as api from '../block/utils/api';
import ServerSideRender from '@wordpress/server-side-render';
const el = wp.element.createElement;
import { useState, useEffect } from '@wordpress/element';
import { SelectControl } from '@wordpress/components';
import { Panel, PanelBody, PanelRow } from '@wordpress/components';

const iconEl =
    el('svg', { width: 20, height: 20 ,viewBox : "0 0 64 64"},

        el('path', { className:"cls-1", d: "M41.89,39.32H39.14c-.75,0-1.71.34-2,2v9.71c-.06.57-.26.58-.32.56h-.1L23.51,39.93a.44.44,0,0,0-.29-.11H18.73a1.22,1.22,0,0,0-.87.34,2.17,2.17,0,0,0-.48,1.56l0,17.45c.14,2.06,1.34,2.37,2,2.37h2.3c1.55-.33,1.87-1.21,1.87-1.89l0-9c0-.64.13-1,.36-1l13.3,11.63a.48.48,0,0,0,.28.1l5.24.15h0c.42,0,1.13-.18,1.28-1.42l0-18.82C44.08,40.65,43.81,39.52,41.89,39.32Z" } ),
        el('path', { className:"cls-1", d: "M41.89,39.32H39.14c-.75,0-1.71.34-2,2v9.71c-.06.57-.26.58-.32.56h-.1L23.51,39.93a.44.44,0,0,0-.29-.11H18.73a1.22,1.22,0,0,0-.87.34,2.17,2.17,0,0,0-.48,1.56l0,17.45c.14,2.06,1.34,2.37,2,2.37h2.3c1.55-.33,1.87-1.21,1.87-1.89l0-9c0-.64.13-1,.36-1l13.3,11.63a.48.48,0,0,0,.28.1l5.24.15h0c.42,0,1.13-.18,1.28-1.42l0-18.82C44.08,40.65,43.81,39.52,41.89,39.32Z" } ),
        el('path', { className:"cls-1", d: "M42.14,29.19l-22.76-.05c-.71,0-1.63.32-2,2v3h0a1.51,1.51,0,0,0,.16.7c.19.62.77,1.35,2.43,1.35l21.65,0h0a2.19,2.19,0,0,0,2.46-2.38V31.38C43.88,29.57,42.91,29.19,42.14,29.19Z" } ),
        el('path', { className:"cls-1", d: "M42.22,18.79l-5,0a1.28,1.28,0,0,1-.8-.2.72.72,0,0,1-.2-.6v-3.8a11.46,11.46,0,0,0-.88-4.24C33.42,6.37,31.23,4,27,4h0a10.74,10.74,0,0,0-4.28.87c-3.62,1.93-5.24,4.76-5.25,9.18l0,9.56a2.06,2.06,0,0,0,.64,1.64,2.55,2.55,0,0,0,1.75.56l22.05,0h0a2.1,2.1,0,0,0,2.25-2V20.7C44.12,20,43.81,19.13,42.22,18.79ZM30,17.69c0,.4-.13.89-1.06,1.07H24.74c-.44,0-.95-.15-1.07-1.29V13a3.33,3.33,0,0,1,.05-.56,2.92,2.92,0,0,1,3-2.33c.71,0,.94,0,1,0A2.68,2.68,0,0,1,30,13Z" } ),
    );

registerBlockType( 'zip-recipes/nutrition-label', {
    title: __('Nutrition Label','zip-recipes'),
    description: __ ('Show a nutrition label from a recipe.', 'zip-recipes'),
    icon: iconEl,
    category: 'widgets',
    keywords: [
        __('Recipe', 'zip-recipes'),
        __('Zip Recipes', 'zip-recipes'),
        __('Recipes', 'zip-recipes'),
    ],
    attributes: {
        recipe_id: {
            type: 'string',
            default: '',
        }
    },
    edit: function( props ) {
        const { attributes, setAttributes } = props;
        const [ recipes, setRecipes ] = useState([]);

        useEffect(function(){
            api.getRecipes().then( ( response ) => {
                let recipes = response.data;
                setRecipes( recipes );

            })
        }, []);

        let options = [
            {
                label: 'Select a Recipe',
                value: 0
            }
        ];

        if ( recipes.length ) {
            for( var index in recipes ) {
                options.push({
                    label: recipes[index].title,
                    value: recipes[index].id
                });
            }
        }

        return (
            <div { ...useBlockProps() } >
                <InspectorControls>
                    <Panel header="Recipe Settings">
                        <PanelBody initialOpen={ true }>
                            <PanelRow>
                                <SelectControl
                                    label="Recipe"
                                    value={attributes.recipe_id}
                                    options={ options }
                                    onChange={ ( recipeId ) => setAttributes({ recipe_id: recipeId }) }
                                />
                            </PanelRow>
                        </PanelBody>
                    </Panel>

                </InspectorControls>
                <ServerSideRender
                    block="zip-recipes/nutrition-label"
                    attributes={ {
                        recipe_id: attributes.recipe_id
                    } }
                />
            </div>
        );
    },
    save: function() {
        // Rendering in PHP
        return null;
    },
} );