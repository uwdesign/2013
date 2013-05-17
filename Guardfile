interactor :off

# guard 'coffeescript', :input => 'source/js', :output => 'public/wp-content/themes/uwdesign2013/js', :bare => %w{}

guard 'sprockets', :minify => false, :destination => 'public/wp-content/themes/uwdesign2013/js', :asset_paths => ['source/js'] do
  watch(%r{source/js/.+\.*}) { |m| "source/js/site.js" }
end

guard 'compass', :configuration_file => 'source/compass.rb' do
  watch(/^source\/css\/(.*)\.scss/)
end