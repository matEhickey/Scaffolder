from kivy.config import Config
Config.set('graphics','resizable',0)

from kivy.app import App
from kivy.uix.screenmanager import ScreenManager, Screen


from kivy.core.window import Window
Window.size = (500, 700)

import sequenceur


class RootWidget(ScreenManager):
    pass


class MainApp(App):
    def build(self):
        root = RootWidget()
        self.title = "TemplateApp"
        return root

    def on_pause(self):
        print("on_pause")
        return True  # app sleeps until resume return False to stop the app
    def on_stop(self):
        print("on_stop")
    def on_resume(self):
        print("on_resume")

if __name__ == '__main__':
    MainApp().run()
